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
        return view('admin.projeSec',['proje' => $query]);
    }


    public function addImage(Request $request)
    {
      $this->validate($request, [
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($request->hasFile('image')) {
          // $user_id = Auth::user()->id;
          $proje_id = $request->sec;
          $image = $request->file('image');
           dd($image);
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $image->move($destinationPath, $name);
          // $this->save();
          $query = DB::SELECT('INSERT INTO resimler (proje_id,image_path,image_name) Values (?,?,?)',[$proje_id,$image,$name]);
           if ($query) {
             return response()->json(['name' => $name]);

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
            'rate' => 'required',
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
      $query = DB::SELECT('SELECT (sum(resim_rating.rating)/count(resim_rating.resim_id)) as ort, resimler.id as id, resimler.image_name as image_name FROM resim_rating
                          INNER JOIN resimler ON resimler.id =resim_rating.resim_id WHERE 1
                          GROUP BY resim_id');

      return view('album',['images' => $query]);
    }


    public function getByID(Request $request)
    {
      $user_id = Auth::user()->id;
      $id = $request->id;
      $rate  = $request->rate;
      $query = DB::SELECT('INSERT INTO resim_rating(user_id,resim_id,rating) Values (?,?,?)',[$user_id,$id,$rate]);
      $user_id = Auth::user()->id;
      $users = DB::SELECT('SELECT * FROM users where id = ?',[$user_id]);
      foreach ($users as $user) {
        $name=$user->name;
      }
     return back()->with('success','Image Rating successfully<br> by '.$name);
    }
}
