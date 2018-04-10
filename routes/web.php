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
Route::get('/home','denemeController@index')->name('home');

Route::get('/','denemeController@index')->name('home');
Route::post('/starRating','AlbumController@galery_rating')->name('starRating');

Route::post('/starRating',array('as'=>'starRating',
'uses'=>'AlbumController@galery_rating'));

Auth::routes();


Route::group(['middleware' => 'auth','middleware' => 'adminCheck'], function()
{
  route::get('admin','AdminController@index')->name('admin');
  route::get('projeEkle','AdminController@projeEkle')->name('projeEkle');
  route::post('projeEkle','AdminController@ekle')->name('ekle');
  // route::get('projeDetay','AdminController@projeDetay')->name('projeDetay');
  route::post('detay','AdminController@detay')->name('detay');
  // Route::get('admin','AdminController@index')->name('admin');
  // proje seç ve resim ekle
  // route::get('selectProje','ImageController@resimEkle')->name('selectProje');
  // route::post('selectProje','ImageController@sec');
  // // add proje
  // route::get('addProje','ProjeController@addProje')->name('addProje');
  // route::post('addProje','ProjeController@add');
  // // delete image
  // route::get('deleteImage','ImageController@delete')->name('deleteImage');
  // // Route::get('deleteImage','UploadImageController');

  //admin user değişikliği yapılacak
});
route::get('projeler','HomeController@index')->name('projeler');



// Route::get('/admin','AdminController@index')->middleware(['adminCheck']);

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('admingiris','AdminController@index');

// Route::get('/album_onaysiz','AlbumController@display2')->name('album_onaysiz');


// Route::get('/projeler','ProjeController@display')->name('projeler');


// Route::get('/album','AlbumController@display')->name('album');
// Route::post('galery','ProjeController@galery')->name('galery');
// Route::get('galeryDetay','ProjeController@galeryDetay')->name('galeryDatay');
