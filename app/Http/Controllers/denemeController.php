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
                                     resimler.id as id,
                                     resimler.image_name as image_name,
                                     proje.name as proje_name
                                     FROM ((proje
                                     INNER JOIN resimler ON proje.id = resimler.proje_id)
                                     LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id)
                                     WHERE 1
                                     GROUP BY resimler.id order by resimler.id desc');
       return view('deneme',['projeler'=>$query,'images'=>$query2]);
     }

}
