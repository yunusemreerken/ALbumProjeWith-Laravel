<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProjeController extends Controller
{
    public function addProje()
    {
      return view("admin.addProje");
    }
    public function add(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
      ]);
      $name = $request->name;
      $query = DB::SELECT('INSERT INTO proje (name) Values (?)',[$name]);
      if ($query) {
        return response()->json(['name' => $name]);
      }
      return back()->with('success','Proje Added successfully');
    }
    public function display()
    {
      $query = DB::SELECT('SELECT * FROM proje');
      return view('proje',['projects' => $query]);
    }

}
