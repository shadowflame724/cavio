<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function moveImg($newName, $oldName = null)
    {
        $tmpFile = public_path('upload/tmp/') . $newName;
        $file = public_path('upload/images/') . $newName;
        if ($oldName != null AND file_exists('upload/images/' . $oldName)) {
            unlink(public_path('upload/images/' . $oldName));
        }

        rename($tmpFile, $file);

        return true;
    }

    public function deleteImg($name)
    {
        if (file_exists('upload/images/' . $name) AND $name != null) {
            unlink(public_path('upload/images/' . $name));
        }

        return true;
    }
}
