<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('image-view', 'ProductImageController@index');
// Route::post('image-submit', 'ProductImageController@store');

// Route::get('ajax-brand-options', 'CategoryOptionAjax@brandOptions');


Auth::routes();

Route::get('/', 'App\Http\Controllers\ProductImageController@posVue');
Route::get('/home', 'App\Http\Controllers\ProductImageController@posVue');
Route::get('/card/list', 'App\Http\Controllers\ProductImageController@cardlist');


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/get-all-cateogory-selected-by-main-category/{main_category_id}', 'App\Http\Controllers\MainCategoryController@get_category_by_main_category')->name('get_all_cateogory_selected_by_main_category');
Route::get('/get-all-sub-cateogory-selected-by-category/{category_id}', 'App\Http\Controllers\MainCategoryController@get_sub_category_by_category')->name('get_all_sub_category_by_category');

Route::get('/latest-products-json', 'App\Http\Controllers\WebsiteController@latest_product_json')->name('product_latest_product_json');
Route::get('/show-product-json/{product}', 'App\Http\Controllers\WebsiteController@show_product_json')->name('product_show_product_json');
Route::get('/search_product_json/{limit}/{key}', 'App\Http\Controllers\WebsiteController@search_product_json')->name('product_search_product_json');
// Route::get('/get-product-related-info-json/{product}', 'WebsiteController@get_product_related_info_json')->name('product_get_product_related_info_json');


Route::get('/getuersysteminfo','App\Http\Controllers\UserSystemInfoController@getusersysteminfo');
Route::post('/purchase/create', [PurchaseController::class, 'store']);
Route::post('/order/create', [OrderController::class, 'store'])->name('order.add');

