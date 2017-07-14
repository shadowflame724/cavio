<?php

namespace App\Http\Controllers\Backend\File;

use JBZoo\Image\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function uploadImg($file, $width, $height, $flug = false)
    {
        $imgName = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $img = new Image($path);
        $imgWidth = $img->getWidth();
        $imgHeight = $img->getHeight();
        if (!file_exists(public_path('/upload/tmp'))) {
            mkdir(public_path('/upload/tmp'), 0777,     true);
        }
        if ($imgWidth < $width || $imgHeight < $height) {
            $json = [
                'error' => [
                    'title' => 'Incorrect photo size',
                    'text' => 'Min size: ' . $width . ' × ' . $height
                ]
            ];
            return $json;
        } else {
            if ($flug == false) {
                $img->thumbnail($width, $height)->saveAs(public_path('/upload/tmp/' . $imgName));
            } else {
                $img->saveAs(public_path('/upload/tmp/' . $imgName));
            }

            $json = [
                'success' => [
                    'title' => 'Done',
                    'text' => 'Photo upload',
                    'imgName' => $imgName,
                    'path' => $img->getPath()
                ]
            ];

            return $json;
        }

    }

    public function uploadImage(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 650, 360);

        return response()->json($json);
    }

    public function uploadCollection(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 1920, 1103, true);

        return response()->json($json);
    }

    public function uploadFinishTissue(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 230, 230);

        return response()->json($json);
    }

}
