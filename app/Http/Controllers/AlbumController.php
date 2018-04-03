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
                                  resimler.id as id,
                                  resimler.image_name as image_name
                                  FROM resimler
                                  LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
                                  WHERE 1
                                  GROUP BY resimler.id
                                   ');
    return view('album',['images' => $query]);
  }
  public function galery_rating(Request $request)
  {
    // header('Content-Type: text/html; charset=utf-8');
    $rate = Input::post('rate');
    $id = Input::post('id');
    $user_id = Auth::user()->id;
    $check = DB::SELECT('SELECT COUNT(*) as sayac from resim_rating WHERE user_id =? AND resim_id=? AND NOT rate = ?',[$user_id,$id,0]);
    foreach ($check as $checked) {
        if ($checked->sayac==0) {
          $query = DB::SELECT('INSERT INTO resim_rating(user_id,resim_id,rate) Values (?,?,?)',[$user_id,$id,$rate]);//resim id sadece ilki alınıyor 
          $query2 = DB::SELECT('SELECT sum(resim_rating.rate) as rate,
                                       count(resim_rating.resim_id) as count,
                                       resimler.id as id,
                                       resimler.image_name as image_name
                                       FROM resimler
                                       LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
                                       WHERE 1
                                       GROUP BY resimler.id
                                        ');
          echo "<br><br>";
          foreach ($query2 as $key) {
            $rate = $key->rate;
            $count = $key->count;
          }
          echo $rate."/". round(($rate/$count),2);
        }else {
            Session::flash('success', 'Zaten oylama yapılmış');
        }
    }

  }
}
