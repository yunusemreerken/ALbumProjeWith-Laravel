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
    public function resimEkle()
    {
      $query = DB::SELECT('SELECT * FROM proje');
        return view('admin.projeSec',['proje' => $query]);
    }
    public function sec(Request $request)
    {
      $this->validate($request, [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $user_id = Auth::user()->id;
      $proje_id = $request->proje_id;
      if ($request->hasFile('image')) {
          $image = $request->file('image');
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $image->move($destinationPath, $name);
          $query = DB::SELECT('INSERT INTO resimler (proje_id,image_path,image_name) VALUES (?,?,?)',[$proje_id,$image,$name]);
          return back()->with('success','Image Upload successfully');
      }
    }
    public function delete(){
      return "sil";
    }
    public function imageResize($imageResourceId,$width,$height) {
      $targetWidth =200;
      $targetHeight =200;
      $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
      imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
      return $targetLayer;
    }

}
