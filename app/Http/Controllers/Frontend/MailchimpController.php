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
        dd($mail.' - unsubscribe already');

//        $newsletter->unsubscribe($mail);
    }
}