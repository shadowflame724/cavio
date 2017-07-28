const { mix } = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
  .sass('resources/assets/sass/frontend/app.scss', 'public/css/frontend.css')
  .sass('resources/assets/sass/backend/app.scss', 'public/css/backend.css')
  .scripts([
    'resources/assets/js/frontend/vendor/jquery.min.js',
    'resources/assets/js/frontend/vendor/jquery.color.min.js',
    'resources/assets/js/frontend/vendor/smooth-scrollbar.js',
    'resources/assets/js/frontend/vendor/jquery.bez.min.js',
    'resources/assets/js/frontend/vendor/swiper.jquery.min.js',
    'resources/assets/js/frontend/vendor/velocity.min.js',
    'resources/assets/js/frontend/vendor/jquery.mousewheel.min.js'
  ], 'public/js/vendor.js')
  .scripts([
    'resources/assets/js/frontend/main.js'
  ], 'public/js/frontend.js')
  .js([
    'resources/assets/js/backend/app.js',
    'resources/assets/js/plugin/sweetalert/sweetalert.min.js',
    'resources/assets/js/plugins.js'
  ], 'public/js/backend.js')
  .webpackConfig({
    plugins: [
      new WebpackRTLPlugin('/css/[name].rtl.css')
    ]
  });

if(mix.config.inProduction){
    mix.version();
}
