<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

        /*
         * Languages in global config
         */
        $lang = get_lang_from_domain_name($request);
        $domain = ENV('APP_DOMAIN');
        $appLangs = [
            'lang' => $lang,
            'paths' => [
                'en' => 'http://' . $domain,
                'it' => 'http://it.' . $domain,
                'ru' => 'http://ru.' . $domain,
            ],
            'suf' => ($lang == 'en') ? '' : '_' . $lang,
        ];
        config([
            'app.langs' => $appLangs
        ]);
        // ******

        View::composer(['*'], function ($view) use ($request, $isAjax, $appLangs) {
            // геолокация
            $path = $request->path();
            if ($path == '/') {
                $path = '';
            }
            if (isset($getParams)) {
                $path .= $getParams['link'];
            }

            $view
                ->with([
                    'isAjax' => $isAjax,
                    'pageLayout' => ($isAjax)?'ajax':'app_dev',
                    'curPath' => $path,
                    'langPaths' => $appLangs['paths'],
                    'langSuf' => $appLangs['suf'],
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
