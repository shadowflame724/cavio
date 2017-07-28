<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Message\ManageMessageRequest;
use App\Http\Requests\Backend\Message\StoreMessageRequest;
use App\Models\Message\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return redirect()->route('frontend.contacts')->withFlashSuccess(trans('frontend.contacts.message.sent'));
    }}
