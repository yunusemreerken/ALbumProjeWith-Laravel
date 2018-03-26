<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UploadImageController extends Controller
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
        return view('admin.uploadImage');
    }

    public function addImage(Request $request)
    {
        $name = $request->name;
        $image = $request->image;
        $image = $_FILES['image']['name'];
        $query = DB::SELECT('INSERT INTO resimler(proje_id,image,name) Values (?,?,?)',['1',$name,$image]);
        if ($query) {
          return response()->json(['name' => $name, 'image' => $image]);

        }
    }
    
