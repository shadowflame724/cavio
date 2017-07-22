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
            mkdir(public_path('/upload/tmp'), 0777, true);
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

    public function uploadThreeSize($request, $type = 'collection')
    {
        $imgName = time() . '.' . $request->getClientOriginalExtension();
        $path = $request->getRealPath();
        $img = new Image($path);
        $horizontal = new Image($path);
        $thumb = new Image($path);

        $imgWidth = $img->getWidth();
        $imgHeight = $img->getHeight();
        if (!file_exists(public_path('/upload/tmp/' . $type . '/original'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/original'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/' . $type . '/horizontal'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/horizontal'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/' . $type . '/thumb'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/thumb'), 0777, true);
        }
        if ($imgWidth < 2000 || $imgHeight < 1500) {
            $json = [
                'error' => [
                    'title' => 'Incorrect photo size',
                    'text' => 'Min size: ' . 2000 . ' × ' . 1500
                ]
            ];
        } else {
            $img->fitToWidth(2000)->saveAs(public_path('/upload/tmp/' . $type . '/original/' . $imgName));
            $horizontal->thumbnail(1600, 360)->saveAs(public_path('/upload/tmp/' . $type . '/horizontal/' . $imgName));
            if ($type == 'zone') {
                $thumb->thumbnail(530, 370)->saveAs(public_path('/upload/tmp/' . $type . '/thumb/' . $imgName));
            } else {
                $thumb->thumbnail(480, 640)->saveAs(public_path('/upload/tmp/' . $type . '/thumb/' . $imgName));
            }

            $json = [
                'success' => [
                    'title' => 'Done',
                    'text' => 'Photo upload',
                    'imgName' => $imgName,
                    'path' => $img->getPath()
                ]
            ];

        }

        return $json;
    }

    public function uploadFinishTissue(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 230, 230);

        return response()->json($json);
    }

    public function uploadCollectionZone(Request $request)
    {
        foreach ($request->file('file') as $item) {
            $json[] = $this->uploadThreeSize($item, 'zone');
        }
        return response()->json($json);
    }

    public function uploadCollection(Request $request)
    {
        $json = $this->uploadThreeSize($request->file('file'));

        return response()->json($json);
    }

    public function uploadCropped(Request $request)
    {
        $path = $request->file('croppedImage')->getRealPath();
        $img = new Image($path);
        $oldImg = $request->get('name');

        $img->saveAs(public_path($oldImg));

        $json = [
            'success' => [
                'title' => 'Done',
                'text' => 'Photo upload',
            ]
        ];
        return response()->json($json);
    }

}
