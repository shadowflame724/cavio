<?php

namespace App\Providers;

use App\Models\Category\Category;
use App\Models\Collection\Collection;
use App\Models\Message\Message;
use App\Models\Zone\Zone;
use App\Models\Settings\Settings;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        /*
         * Application locale defaults for various components
         *
         * These will be overridden by LocaleMiddleware if the session local is set
         */

        $lang = get_lang_from_domain_name($request);

        // Force SSL in production
        if ($this->app->environment() == 'production') {
            //URL::forceScheme('https');
        }

        // Set the default string length for Laravel5.4
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        $collections = Collection::all();
        $categories = Category::all();
        $zones = Zone::with('collectionZones')->get();
        $messages = Message::where('status', 0)->get();
        $settings = [];
        $settingModel = Settings::find(1);
        if(!empty($settingModel)){
            $soc = json_decode($settingModel->soc_links, true);
            $settings['soc_links'] = $soc;
            $disc = json_decode($settingModel->discount_data, true);
            $settings['discount_data'] = $disc;
            $settings['koef_data'] = (float)$settingModel->koef_data;
            $settings['vat_data'] = (float)$settingModel->vat_data;
        }
        config(['app.settings' => $settings]);

        View::share([
            'collections' => $collections,
            'categories' => $categories,
            'zones' => $zones,
            'messages' => $messages,
            'settings' => $settings
        ]);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Sets third party service providers that are only needed on local/testing environments
         */
        if ($this->app->environment() != 'production') {
            /**
             * Loader for registering facades.
             */
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            /*
             * Load third party local providers
             */
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);

            /*
             * Load third party local aliases
             */
            $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
        }
    }
}
