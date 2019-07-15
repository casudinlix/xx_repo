<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Filemanager;
use UniSharp\LaravelFilemanager\Events\ImageWasUploaded;
use DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Request;
class HasUploadedImageListener
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
    public function handle(ImageWasUploaded $event)
    {
      DB::beginTransaction();
      try{
        DB::commit();
        $files = Request()->file('upload');


         foreach ($files as $key ) {
           $size=$key->getSize();// / 1024;
         }
         //dd($size);
        // // Get te public path to the file and save it to the database
        $publicFilePath = str_replace(public_path(), "", $event->path());
        Filemanager::create(['path' => $publicFilePath,'users_id'=>\Auth::user()->id,'sizefile'=>$size]);


        Activity()
        ->causedBy(\Auth::user()->id)
        ->withProperties($request->all())
        ->log(Auth::user()->name.'Upload File baru, ukuran '.$size);
        }catch(\Exception $e){
        DB::rollback();
        //gagal
        echo $e;

        }

    }
}
