<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use UniSharp\LaravelFilemanager\Events\ImageIsDeleting;
use App\Models\Filemanager;
use DB;
class DeleteImageListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ImageIsDeleting $event)
    {
      // Get the public path for the file
     $publicFilePath = str_replace(public_path(), "", $event->path());
     //dd(\Input::all());
     // Search for usages of the file
     $used = DB::table('filemanager')->where('path', $publicFilePath)->get();
     if (count($used) > 0) {
       $delete=DB::table('filemanager')->where('path',$publicFilePath)->delete();
         // The image is in use, create a response message
         if ($delete==true) {
          
         } else {
           $message = $this->formatMessage($used);
           // Die with response message
           die($message);
         }


     }
    }
    private function formatMessage($files)
{
    $message = "<p>File yang Anda coba hapus sedang digunakan dalam filemanager dengan id berikut:</p>";
    $message .= "<ul>";
    foreach ($files as $file) {
        $message .= "<li>$file->id</li>";
    }
    $message .= "</ul>";
    $message .= "<p>Harap hapus referensi basis data tersebut sebelum Anda dapat menghapus file.</p>";
    return $message;
}
}
