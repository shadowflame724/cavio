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

    public function uploadCollection(Request $request)
    {

        $imgName = time() . '.' . $request->file('file')->getClientOriginalExtension();
        $path = $request->file('file')->getRealPath();
        $img = new Image($path);
        $horizontal = new Image($path);
        $vertical = new Image($path);


        $imgWidth = $img->getWidth();
        $imgHeight = $img->getHeight();
        if (!file_exists(public_path('/upload/tmp/collection/original'))) {
            mkdir(public_path('/upload/tmp/collection/original'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/collection/horizontal'))) {
            mkdir(public_path('/upload/tmp/collection/horizontal'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/collection/vertical'))) {
            mkdir(public_path('/upload/tmp/collection/vertical'), 0777, true);
        }
        if ($imgWidth < 1920 || $imgHeight < 1103) {
            $json = [
                'error' => [
                    'title' => 'Incorrect photo size',
                    'text' => 'Min size: ' . 1920 . ' × ' . 1103
                ]
            ];
        } else {
            if($imgWidth > 2000){
                $img->fitToWidth(2000)->saveAs(public_path('/upload/tmp/collection/original/' . $imgName));
            }elseif ($imgHeight > 2000){
                $img->fitToHeight(2000)->saveAs(public_path('/upload/tmp/collection/original/' . $imgName));
            }else{
                $img->saveAs(public_path('/upload/tmp/collection/original/' . $imgName));
            }
            $horizontal->thumbnail(1186, 270)->saveAs(public_path('/upload/tmp/collection/horizontal/' . $imgName));
            $vertical->thumbnail(480, 640)->saveAs(public_path('/upload/tmp/collection/vertical/' . $imgName));

            $json = [
                'success' => [
                    'title' => 'Done',
                    'text' => 'Photo upload',
                    'imgName' => $imgName,
                    'path' => $img->getPath()
                ]
            ];

        }

        return response()->json($json);
    }

    public function uploadFinishTissue(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 230, 230);

        return response()->json($json);
    }

    public function uploadCollectionZone(Request $request)
    {
        foreach ($request->file('file') as $item) {
            $json[] = $this->uploadImg($item, 230, 230);
        }
        return response()->json($json);
    }

}
