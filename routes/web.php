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
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth','middleware' => 'adminCheck'], function()
{
  Route::get('admin','AdminController@index')->name('admin');
  // proje seç ve resim ekle
  route::get('selectProje','ImageController@resimEkle')->name('selectProje');
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

Route::get('/', 'HomeController@index')->name('home');
// Route::get('admingiris','AdminController@index');

Route::get('/album','AlbumController@display')->name('album');

// Route::get('/album_onaysiz','AlbumController@display2')->name('album_onaysiz');


// Route::post('/starRating','AlbumController@galery_rating')->name('starRating');

Route::post('/starRating',array('as'=>'starRating',
  'uses'=>'AlbumController@galery_rating'));

Route::get('/projeler','ProjeController@display')->name('projeler');
