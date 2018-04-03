<?php

namespace App\Http\Controllers;

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
      $query = DB::SELECT('SELECT * FROM proje');
      return view('proje',['projects' => $query]);
    }

}
