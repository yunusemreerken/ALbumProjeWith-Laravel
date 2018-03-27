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

Route::group(['middleware' => 'auth','middleware' => 'adminCheck'], function()
{
  Route::get('admin','AdminController@index');
  // proje seç ve resim ekle
  route::get('selectProje','ImageController@selectProje')->name('selectProje');
  route::post('selectProje','ImageController@sec');
  // add proje
  route::get('addProje','ProjeController@addProje')->name('addProje');
  route::post('addProje','ProjeController@add');
  // delete image
  route::get('deleteImage','ImageController@delete')->name('deleteImage');
  // Route::get('deleteImage','UploadImageController');

  //admin user değişikliği yapılacak
});

Auth::routes();

// Route::get('/admin','AdminController@index')->middleware(['adminCheck']);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('admingiris','AdminController@index');

Route::get('/album','ImageController@display')->name('album');

Route::post('/starRating','ImageController@getByID')->name('starRating');

Route::get('/projeler','ProjeController@display')->name('projeler');



// Route::get('/paket-detayi/{id}', 'MainPackagesController@getByID')->name('MainPackagesControllergetByID');
