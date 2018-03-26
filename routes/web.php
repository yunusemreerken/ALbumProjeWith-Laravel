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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin','AdminController@index')->middleware(['adminCheck']);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('admingiris','AdminController@index');

// add image
route::get('uploadImage','ImageController@index')->name('uploadImage');
route::post('uploadImage','ImageController@addImage');

// delete image
route::get('deleteImage','ImageController@delete')->name('deleteImage');
// Route::get('deleteImage','UploadImageController');
