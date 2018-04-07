<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use DB;

class ProjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addProje()//ekle view
    {
      return view("admin.addProje");
    }
    public function add(Request $request)// ekle post al
    {
      $this->validate($request, [
          'name' => 'required',
      ]);
      $name = $request->name;
      $query = DB::SELECT('INSERT INTO proje (name) Values (?)',[$name]);
      if (isset($query)) {
        return back()->with('success','Başarılı bir şekilde eklendi');
      }
    }


    public function display()//listeleme işlemi
    {
      $query = DB::SELECT('SELECT proje.name as proje_name,
          proje.id as id,
          SUM(resim_rating.rate) as rate,
          count(resim_rating.resim_id) as coun
          FROM proje
          INNER join resimler on resimler.proje_id=proje.id
          RIGHT join resim_rating on resim_rating.resim_id =resimler.id
          GROUP by proje.id
          ORDER BY proje.id desc
        ');
      return view('proje',['projects' => $query]);
    }
    public function galery(Request $request){
      $id = $request->project_id;
      $query = DB::SELECT('SELECT proje.name as proje_name,resimler.image_name as image_name,resimler.id as id
                            FROM proje
                            INNER JOIN resimler ON proje.id = resimler.proje_id
                            WHERE proje.id = ?
                            order by proje.id DESC
                                   ',[$id]);
      return view('album',['images' => $query]);
    }
    public function galeryDetay(Request $request){
      // $id = $request->project_id;
      $query = DB::SELECT('SELECT sum(resim_rating.rate) as rate,
                                   count(resim_rating.resim_id) as count,
                                   resimler.id as id,
                                   resimler.image_name as image_name,
                                   proje.name as proje_name
                                   FROM ((proje
                                   INNER JOIN resimler ON proje.id = resimler.proje_id)
                                   LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id)
                                   WHERE 1
                                   GROUP BY resimler.id order by resimler.id desc
                                   ');
      return view('album',['images' => $query]);
    }

}
