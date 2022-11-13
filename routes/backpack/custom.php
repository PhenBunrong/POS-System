<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SelectOptionAjaxController;
use App\Http\Controllers\Admin\ProductCrudController;
use App\Models\Product;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.


Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('sub-category', 'SubCategoryCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('color', 'ColorCrudController');
    Route::crud('size', 'SizeCrudController');
    Route::crud('unit', 'UnitCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::get('/product/getProduct','ProductCrudController@getProduct');
    Route::get('/product/getFile/{id}','ProductCrudController@getFile');
    Route::get('/product/delFile/{id}','ProductCrudController@deleteFile')->name('delete.file');
    Route::crud('status', 'StatusCrudController');
    Route::crud('writer', 'WriterCrudController');
    Route::crud('publication', 'PublicationCrudController');
    Route::crud('main-category', 'MainCategoryCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    Route::get('charts/weekly-products', 'Charts\WeeklyProductChartController@response')->name('charts.weekly-products.index');
    Route::get('charts/weekly-members', 'Charts\WeeklyMemberChartController@response')->name('charts.weekly-members.index');
    Route::crud('user', 'UserCrudController');
    Route::crud('vendor', 'VendorCrudController');
    Route::crud('company', 'CompanyCrudController');
    Route::crud('customer', 'CustomerCrudController');
    Route::post('customer/import', 'CustomerCrudController@import')->name('customer.import');
    Route::get('customer/export', 'CustomerCrudController@export')->name('customer.export');

    Route::crud('test', 'TestCrudController');
    Route::crud('member', 'MemberCrudController');
    Route::crud('experience', 'ExperienceCrudController');
    Route::get('dashboard', 'DashboardCrudController@countsuer');
    Route::crud('teacher', 'TeacherCrudController');
    Route::crud('staff', 'StaffCrudController');
   
    Route::crud('supplier', 'SupplierCrudController');
    Route::crud('purchase', 'PurchaseCrudController');
    Route::crud('purchase/export', 'ExportCrudController');
    Route::crud('order', 'OrderCrudController');
});

// this should be the absolute last line of this file
// Route::group([
//     'prefix'     => config('backpack.base.route_prefix', 'admin'),
//     'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
// ], function () {
//     // Language
//     Route::get('language/texts/{lang?}/{file?}', 'LanguageCrudController@showTexts');
//     Route::post('language/texts/{lang}/{file}', 'LanguageCrudController@updateTexts');
//     Route::crud('language', 'LanguageCrudController');
    
// });
// })->where('path', '.+');

// Route::get("admin/locale/{lange}",[LocalizationController::class,'setLange']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/product/delFile/{id}',[ProductCrudController::class,'deleteFile'])->name('delFile.delete');

Route::post('product/restore/{id}', [ProductCrudController::class,'restore']);
Route::post('product/force_delete/{id}', [ProductCrudController::class,'forecDelete']);