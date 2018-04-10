<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminCheck');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::SELECT('SELECT proje.id as proje_id, proje.name as proje_name,COUNT(resim_rating.rate) as _count, SUM(resim_rating.rate) as rate, COUNT(DISTINCT(resimler.image_name)) as resimlercount
                              FROM proje
                              INNER JOIN resimler ON resimler.proje_id=proje.id
                              LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
                              GROUP BY proje.id order by proje.id DESC ');
        return view('admin.index')->with('projeler', $query);
    }
    public function projeEkle()
    {
        return view('admin.proje-ekle');
    }
    public function detay(Request $request)
    {
        if($request->delete!=='sil')
        {
          $proje_id = $request->id;
          $query = DB::SELECT('SELECT proje.id as proje_id,proje.name as proje_name, ANY_VALUE(resimler.image_name) as image_name, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
          FROM proje
          INNER JOIN resimler ON proje.id = resimler.proje_id
          LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
          where proje_id = ?
          GROUP BY resimler.id',[$proje_id]);
          return view('admin.proje-detay')->with('images',$query);
        }
        echo $request->delete;

    }


}
