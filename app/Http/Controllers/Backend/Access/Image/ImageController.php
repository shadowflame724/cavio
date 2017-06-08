<?php

namespace App\Http\Controllers\Backend\Access\Image;

use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;


class ImageController extends Controller
{
    /**
     * @param Request $request
     */
    public function upload(Request $request)
    {

        $input = Input::all();
        dd('input');
        die();
        $rules = array(
            'file' => 'image|max:3000',
        );

        $validation = Validator::make($input, $rules);

        if ($validation->fails())
        {
            return Response::make($validation->errors->first(), 400);
        }

        //$file = Input::file('file');

        $imageName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move(public_path('img/backend/news/'), $imageName);

        if( $upload_success ) {
            return Response::json('success', $imageName);
        } else {
            return Response::json('error', 400);
        }

    }
}
