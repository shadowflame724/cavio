<?php

namespace App\Http\Controllers\Backend\File;

use JBZoo\Image\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    public function uploadImg($file, $width, $height)
    {
        $imgName = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $img = new Image($path);
        $imgWidth = $img->getWidth();
        $imgHeight = $img->getHeight();
        if ($imgWidth < $width || $imgHeight < $height) {
            $json = [
                'error' => [
                    'title' => 'Incorrect photo size',
                    'text' => 'Min size: ' . $width . ' × ' . $height
                ]
            ];
            return $json;
        } else {
            $img->thumbnail($width, $height)->saveAs(public_path('/upload/tmp/' . $imgName));

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
        $json = $this->uploadImg($request->file('file'), 1366, 768);
        return response()->json($json);
    }

}
