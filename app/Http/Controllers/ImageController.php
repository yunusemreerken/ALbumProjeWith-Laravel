<?php

namespace App\Http\Controllers;

use App\Logic\Image\ImageRepository;
use Illuminate\Support\Facades\Input;
use DB;
class ImageController extends Controller
{
    protected $image;

    public function __construct(ImageRepository $imageRepository)
    {
      $this->middleware('is_admin');
        $this->image = $imageRepository;
    }

    public function getUpload()
    {
        return view('pages.upload');
    }

    public function postUpload()
    {
        $photo = Input::all();
        $proje_name = $photo['name'];
        $query = DB::SELECT('SELECT COUNT(proje.id) as _count, ANY_VALUE(proje.id) as id FROM proje WHERE proje.name = ?',[$proje_name]);

        foreach ($query as $que) {

          if($que->_count>0)
          {
            $id = $que->id;
          }
          else
          {
            $query2 = DB::SELECT('INSERT INTO proje (name,is_deleted) VALUES(?,?)',[$proje_name,0]);
            $id = DB::getPdo()->lastInsertId();
          }
        }
        $response = $this->image->upload($photo,$id);
        return $response;

    }

    public function deleteUpload()
    {

        $filename = Input::get('id');

        if(!$filename)
        {
            return 0;
        }

        $response = $this->image->delete( $filename );

        return $response;
    }
}
