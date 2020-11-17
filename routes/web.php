<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Template Cliente
//home client
Route::get('/', 'ClientController@home');

Route::get('/shop', 'ClientController@shop');
Route::get('/cart', 'ClientController@cart');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/login', 'ClientController@login');
Route::get('/signup', 'ClientController@signup');

//Template Admin
Route::get('/admin', 'AdminController@dashboard');
//Agregar-Template Admin
Route::get('/addcategory', 'AdminController@addcategory');
Route::get('/addproduct', 'ProductController@addproduct');
Route::get('/addslider', 'SliderController@addslider');

//Listar-Template Admin
Route::get('/products', 'ProductController@products');
Route::get('/categories', 'AdminController@categories');
Route::get('/sliders', 'SliderController@sliders');
Route::get('/orders', 'AdminController@orders');
