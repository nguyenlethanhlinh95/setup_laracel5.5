<?php

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

Route::get('/', 'PagesController@index')->name('homePage');
Route::get('/home', 'PagesController@index')->name('homePage');

Route::get('/shop', 'PagesController@index')->name('shop');
Route::get('/products', 'PagesController@index');
Route::get('/product-details/{id}', 'PagesController@product_detail')->name('product_detail');

Route::get('contact', 'PagesController@contact')->name('contact');

/*--------------Cart--------------*/
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart/addItem/{id}', 'CartController@addItem')->name('cart.add');
route::get('/cart/remove/{id}', 'CartController@destroy')->name('cart.destroy');
/*--------------End Cart--------------*/

/*--------------Authentication--------------*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/*--------------Route for Admin--------------*/
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    Route::get('/', function (){ return view('admin.pages.index'); })->name('admin');
    Route::resource('product','ProductsController');
});
/*--------------END Route for Admin--------------*/

/*--------------End Authentication--------------*/
