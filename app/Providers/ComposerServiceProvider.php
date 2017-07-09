<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        /*
         * Global
         */
        View::composer(
            // This class binds the $logged_in_user variable to every view
            '*', GlobalComposer::class
        );

        /*
         * Frontend
         */
        $isAjax = false;
        if($request->ajax()){
            $isAjax = true;
        }
        $lang = get_lang_from_domain_name($request);
        session()->put('locale', $lang);

        View::composer(['frontend.*','errors.*','api.*'], function ($view) use ($request, $isAjax, $lang) {
            // геолокация
            $path = $request->path();
            if ($path == '/') {
                $path = '';
            }
            if (isset($getParams)) {
                $path .= $getParams['link'];
            }
            $langPaths = [
                'en' => 'http://'.ENV('APP_DOMAIN'),
                'it' => 'http://it.'.ENV('APP_DOMAIN'),
                'ru' => 'http://ru.'.ENV('APP_DOMAIN'),
            ];
            $langSuf = ($lang == 'en')?'':'_'.$lang;

            $view
                ->with([
                    'isAjax' => $isAjax,
                    'pageLayout' => ($isAjax)?'ajax':'app_dev',
                    'curPath' => $path,
                    'langPaths' => $langPaths,
                    'langSuf' => $langSuf,
                ]);
        });
        /*
         * Backend
         */
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
