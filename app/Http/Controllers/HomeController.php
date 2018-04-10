<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $query =DB::SELECT('SELECT proje.id as proje_id,proje.name as proje_name, ANY_VALUE(resimler.image_name) as image_name, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
      FROM proje
      INNER JOIN resimler ON proje.id = resimler.proje_id
      LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
      where proje_id = 13
      GROUP BY resimler.id
       ');
      return  view('projeler')->with('projeler',$query);
    }

}
