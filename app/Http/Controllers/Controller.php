<?php

namespace App\Http\Controllers;

use App\Models\Page\Page;
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
        if ($newName != $oldName AND $oldName != null AND file_exists('upload/images/' . $oldName)) {
            unlink(public_path('upload/images/' . $oldName));
        }

        if ($newName != null AND file_exists($tmpFile)) {
            rename($tmpFile, $file);
        }

        return true;
    }

    public function deleteImg($name)
    {
        if (file_exists('upload/images/' . $name) AND $name != null) {
            unlink(public_path('upload/images/' . $name));
        }

        return true;
    }

    public function page($pageKey)
    {
        $page = Page::where('slug', $pageKey)->get();

        return $page[0];
    }

}
