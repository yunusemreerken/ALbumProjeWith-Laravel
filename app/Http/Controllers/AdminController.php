<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Auth;
use File;
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
    public function ekle(Request $request)
    {
      $this->validate($request, [
          'proje_id'=>'required',
          'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $proje_id = 20;
      $proje_name  = $request->proje_name;
      $proje= DB::SELECT('INSERT INTO proje (name)VALUES (?,?)',[$proje_name,0]);
      dd($proje);
        if($request->hasfile('file'))
         {

            foreach($request->file('file') as $file)
            {


   $input['imagename'] = time().'.'.$file->getClientOriginalExtension();

   $destinationPath = public_path('/images');

   $image->move($destinationPath, $input['imagename']);
                $name=$file->getClientOriginalExtension();
                $file->move(public_path().'/images/', $name);
                $data[] = $name;
                $query = DB::SELECT('INSERT INTO resimler (proje_id,image_path,image_name) VALUES (?,?,?)',[$proje_id,$ifile,$name]);
                return back()->with('success','Image Upload successfully');
            }
         }
  }
    public function detay(Request $request)
    {
        if(isset($request->id))
        {
          $proje_id = $request->id;
          $query = DB::SELECT('SELECT proje.id as proje_id,proje.name as proje_name, ANY_VALUE(resimler.image_name) as image_name,resimler.id as resim_id, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
          FROM proje
          INNER JOIN resimler ON proje.id = resimler.proje_id
          LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
          where proje_id = ?
          GROUP BY resimler.id',[$proje_id]);
          return view('admin.proje-detay')->with('images',$query);
        }
        else if(isset($request->activeted))
        {
          $proje_aktif = $request->activeted;
          $query = DB::SELECT('UPDATE proje SET proje.is_deleted = 0 WHERE  proje.id = ? ',[$proje_aktif]);
          return back()->with('success','Proje activeted successfully');
        }
        else {
            $proje_delete = $request->delete;
            $query = DB::SELECT('UPDATE proje SET proje.is_deleted = 1 WHERE  proje.id = ? ',[$proje_delete]);
            return back()->with('success','Proje delete successfully');
        }
    }
    public function imageDetay(Request $request)
    {
        if (isset($request->delete)) {
            $query = DB::SELECT('UPDATE resimler SET resimler.is_deleted = 1 WHERE resimler.id = ?',[$request->delete]);
            return back()->with('success','Images delete successfully');
        }
        else {
          $query = DB::SELECT('UPDATE resimler SET resimler.is_deleted = 0 WHERE resimler.id = ?',[$request->delete]);
          return back()->with('success','Images delete successfully');
        }
    }

}
