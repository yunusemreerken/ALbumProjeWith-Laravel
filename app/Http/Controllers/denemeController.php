<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class denemeController extends Controller
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
        $query = DB::SELECT('SELECT proje.name as proje_name from proje order by proje.id desc');
        $query2 = DB::SELECT('SELECT sum(resim_rating.rate) as rate,
                                     count(resim_rating.resim_id) as count,
                                     images.id as id,
                                     images.filename as image_name,
                                     proje.name as proje_name
                                     FROM ((proje
                                     INNER JOIN images ON proje.id = images.proje_id)
                                     LEFT JOIN resim_rating ON resim_rating.resim_id = images.id)
                                     WHERE 1
                                     GROUP BY images.id order by images.id desc');
       return view('album',['projeler'=>$query,'images'=>$query2]);
     }

}
