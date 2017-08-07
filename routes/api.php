<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Frontend\Cart\CartContract;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product-image/all', function (Request $request) {
    $files = Storage::disk('products')->files('/');
    $urls = [];
    foreach ($files as $item) {
        $urls[] = Storage::disk('products')->url($item);
    }
//    dd($urls);
    return response()->json($urls);
});
Route::get('/product-image/{file}', function (Request $request, $file) {
    $folder = Storage::disk('products');
    if($folder->has($file)) {
        return $folder->get($file);
    }
});

Route::get('/basket/count', function (CartContract $carts, Request $request) {
    $count = 0;
    $basket = $carts->findAll();
    dd($basket);
    dd($count);
    return $count;
});