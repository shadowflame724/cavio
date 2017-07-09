<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * Class LanguageController.
 */
class LanguageController extends Controller
{
    /**
     * @param $lang
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function swap($lang, Request $request)
    {
        $langRequest = get_lang_from_domain_name($request);
        if ($langRequest != $lang) {
            $defLang = ENV('APP_LOCALE');
            $appUrl = ENV('APP_URL');
            $domain = ENV('APP_DOMAIN');
            if ($lang == $defLang) {
                return redirect($appUrl);
            }
            return redirect('http://' . $lang . '.' . $domain);
        }
        session()->put('locale', $lang);

        return redirect()->back();
    }
}
