<?php

namespace App\Http\Controllers\Backend\File;

use Eventviva\ImageResize;
use JBZoo\Image\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class UploadController extends Controller
{
    public function uploadImg($file, $width, $height, $flug = false)
    {
        $imgName = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->getRealPath();
        $img = new ImageResize($path);
        $imgWidth = $img->getSourceWidth();
        $imgHeight = $img->getSourceHeight();
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
                $img->resizeToBestFit($width, $height)->save(public_path('/upload/tmp/' . $imgName));
            } else {
                $img->save(public_path('/upload/tmp/' . $imgName));
            }

            $json = [
                'success' => [
                    'title' => 'Done',
                    'text' => 'Photo upload',
                    'imgName' => $imgName,
                    'path' => 'upload/tmp/' . $imgName
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
        $img->setQuality(100);
        $horizontal = new Image($path);
        $horizontal->setQuality(100);
        $thumb = new Image($path);
        $thumb->setQuality(100);


        if (!file_exists(public_path('/upload/tmp/' . $type . '/original'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/original'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/' . $type . '/horizontal'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/horizontal'), 0777, true);
        }
        if (!file_exists(public_path('/upload/tmp/' . $type . '/thumb'))) {
            mkdir(public_path('/upload/tmp/' . $type . '/thumb'), 0777, true);
        }

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


        return $json;
    }

    public function uploadFinishTissue(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 480, 480);

        return response()->json($json);
    }

    public function uploadImage(Request $request)
    {
        $json = $this->uploadImg($request->file('file'), 700, 700);

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
        $croppedImg = new Image($path);
        $croppedImg->setQuality(100);
        $croppedImg->saveAs(public_path($request->get('name')));
        $json = [
            'success' => [
                'title' => 'Done',
                'text' => 'Photo upload'
            ]
        ];

        return response()->json($json);
    }

    public function uploadDocument(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:doc,pdf,docx,zip',
        ]);
        if (!file_exists(public_path('upload/documents'))) {
            mkdir(public_path('upload/documents'), 0777, true);
        }

        if ($validator->fails()) {
            $json = [
                'error' => true,
                'message' => $validator->errors()
            ];
        } else {
            $fileName = time() . '.' . $request->file('file')->getClientOriginalExtension();
            $originalFileName = $request->file('file')->getClientOriginalName();

            $request->file('file')->move(public_path('upload/documents/'), $fileName);

            $json = [
                'url' => str_replace('/admin/file', '', $request->getUri())
                    . '/' . $fileName,
                'name' => $originalFileName
            ];
        }

        return response()->json($json);
    }

}
