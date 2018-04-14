<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Auth;
class AlbumController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function display()//foto or album or image
  {
     $query = DB::SELECT('SELECT sum(resim_rating.rate) as rate,
                                 count(resim_rating.resim_id) as count,
                                 images.id as id,
                                 images.filename as image_name
                                 FROM images
                                 LEFT JOIN resim_rating ON resim_rating.resim_id = images.id
                                 WHERE 1
                                 GROUP BY images.id order by images.id desc limit 6
                                   ');

    return view('album',['images' => $query]);
  }
  public function galery_rating(Request $request)
  {
    $user_id = Auth::user()->id;
    $rate = Input::post('rate');
    $id = Input::post('id');
    $check = DB::SELECT('SELECT COUNT(*) as sayac from resim_rating WHERE user_id =? AND resim_id=?',[$user_id,$id]);

    foreach ($check as $checked) {//oylama yapılmamış
        if ($checked->sayac==0) {
          $query = DB::SELECT('INSERT INTO resim_rating(user_id,resim_id,rate) Values (?,?,?)',[$user_id,$id,$rate]);

        }
        else {//oylama yapılmış güncelle
          $query = DB::SELECT('UPDATE resim_rating set rate =? where user_id =? AND resim_id=?',[$rate,$user_id,$id]);

        }
        //fotoğrafların ortlamasını getirir.
        $query2 = DB::SELECT('SELECT sum(resim_rating.rate) as rate,
        count(resim_rating.resim_id) as count,
        images.id as id,
        images.filename as image_name
        FROM images
        LEFT JOIN resim_rating ON resim_rating.resim_id = images.id
        WHERE images.id = ?
        GROUP BY images.id
        ',[$id]);
        foreach ($query2 as $result) {
          $avg = ($result->rate)/($result->count);
        }
        echo $rate ."/".round($avg,2);
    }
  }
}
