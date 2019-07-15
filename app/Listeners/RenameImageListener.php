<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use UniSharp\LaravelFilemanager\Events\ImageIsRenaming;
use App\Models\Filemanager;
use DB;
class RenameImageListener
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
    public function handle(ImageIsRenaming $event)
    {
      // Get the old and new file path from the event object
        $oldFilePath = str_replace(public_path(), "", $event->oldPath());
        $newFilePath = str_replace(public_path(), "", $event->newPath());
        // Search for database records containing the old path
        // And update the record with the new file path
        DB::table('filemanager')->where('path', $oldFilePath)->update(['path' => $newFilePath]);
    }
}
