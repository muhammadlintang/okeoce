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

//view homePage
Route::get('/', 'HomeController@index');
//view  dashboardPage
Route::get('/dashboard', 'dashboard\DashboardController@index');
//view  productPage
Route::get('/product', 'front\ProductController@index');
//view  promoPage
Route::get('/promo', 'front\PromoController@index');
//view  howroorderPage
Route::get('/how_to_order', 'front\HowToOrderController@index');
//view  aboutusPage
Route::get('/about_us', 'front\AboutUsController@index');

//DetailOrder form
//get html form data
Route::get('/detail_order', 'front\DetailOrderController@index');
//get data for datatable
Route::post('/detail_order', 'front\DetailOrderController@post');

// Route::get('/login', 'Auth\LoginController@showLoginForm');
// //Route::post('/login', 'Auth\LoginController@dologin');
// Route::get('/register', 'Auth\RegisterController@index');
// Route::get('/register/select', 'Auth\RegisterController@select');
// Route::get('/logout', 'Auth\LoginController@logout');
// Route::get('/test', 'TestController@index');
// Route::get('/blank', 'Blank@index');
// Route::get('/test_table', 'TestTable@index');
// Route::post('/test_posts', 'TestTable@Posts' );

Auth::routes();
