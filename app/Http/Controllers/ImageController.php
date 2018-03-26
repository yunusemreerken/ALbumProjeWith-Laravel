<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ImageController extends Controller
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
        return view('admin.uploadImage');
    }

    public function addImage(Request $request)
    {
      $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // dd($image);
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
       $image->move($destinationPath, $name);
        // $this->save();
        $query = DB::SELECT('INSERT INTO resimler(proje_id,image,name) Values (?,?,?)',['1',$image,$name]);
         if ($query) {
           return response()->json(['name' => $name, 'image' => $input['imagename']]);

         }
        return back()->with('success','Image Upload successfully');
    }
    }
    public function delete(){
      return "sil";
    }
}
