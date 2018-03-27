<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
        $query = DB::SELECT('SELECT * FROM proje');
        return view('admin.uploadImage',['proje' => $query]);
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
    public function selectProje()
    {
      $query = DB::SELECT('SELECT * FROM proje');
        return view('admin.projeSec',['proje' => $query]);
    }
    public function sec(Request $request)
    {
        $projeSec = $request->sec;
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
            $query = DB::SELECT('INSERT INTO resimler(proje_id,image_path,image_name) Values (?,?,?)',[$projeSec,$image,$name]);
             if ($query) {
               return response()->json(['name' => $name, 'image' => $input['imagename']]);

             }
            return back()->with('success','Image Upload successfully');
        }
    }

    public function delete(){
      return "sil";
    }
    public function display()
    {
      $query = DB::SELECT('SELECT * FROM resimler');
      return view('album',['images' => $query]);
    }
    public function getByID(Request $request)
    {
      $user_id = Auth::user()->id;
      $id = $request->id;
      $rate  = $request->rate;
      $query = DB::SELECT('INSERT INTO resim_rating(user_id,resim_id,rating) Values (?,?,?)',[$user_id,$id,$rate]);
      if ($query) {
        return "1";

      }
     return back()->with('success','Image Rating successfully');
    }
}
