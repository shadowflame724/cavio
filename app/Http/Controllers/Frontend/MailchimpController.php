<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Spatie\Newsletter\Newsletter;
use Illuminate\Http\Request;

class MailchimpController extends Controller
{

    public function subscribeNews(Request $request, Newsletter $newsletter)
    {

        $mail = $request->input('email');
        $newsletter->subscribe($mail);
    }

    public function unsubscribeNews(Request $request, Newsletter $newsletter)
    {
        $mail = $request->input('email');

        $page = [
            'name' => 'Unsubscribe',
            'name-ru' => 'Unsubscribe',
            'name-it' => 'Unsubscribe',
            'body' => 'You are unsubscribe alrady!',
            'body-ru' => 'You are unsubscribe alrady!',
            'body-it' => 'You are unsubscribe alrady!',
        ];

        return view('frontend.pages.static',[
            'page' => $page
        ]);

//        $newsletter->unsubscribe($mail);
    }
}