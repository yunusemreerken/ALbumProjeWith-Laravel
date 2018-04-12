<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class HomeController extends Controller
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

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
//     public function index()
//     {
//       $query = DB::SELECT('SELECT proje.id as proje_id,proje.name as proje_name, ANY_VALUE(resimler.image_name) as image_name, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
//       FROM proje
//       INNER JOIN resimler ON proje.id = resimler.proje_id
//       LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
//       where proje.id = 13
//       GROUP BY resimler.id ,proje.id ORDER BY proje.id DESC
//        ');
//        // $query  = DB::SELECT('SELECT proje.id as proje_id, proje.name as proje_name,COALESCE(ANY_VALUE(resimler.image_name)) as image_name, COUNT(resim_rating.rate) as _count,
//        //  SUM(resim_rating.rate) as rate, COUNT(DISTINCT(resimler.image_name)) as resimlercount
//        //                       FROM proje
//        //                       INNER JOIN resimler ON resimler.proje_id=proje.id
//        //                       LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
//        //
//        //                       ');
//        $query  = DB::SELECT('SELECT
//   proje.id AS proje_id,
//   proje.name AS proje_name,
//   COUNT(resim_rating.rate) AS _count,
//   SUM(resim_rating.rate) AS rate
// FROM
//   proje
// INNER JOIN
//   resimler ON proje.id = resimler.proje_id
// LEFT JOIN
//   resim_rating ON resim_rating.resim_id = resimler.id
// GROUP BY
//   proje.id
// ORDER BY
//   proje.id DESC');
//
//       return  view('projeler')->with('projeler',$query);
//     }



    public function index(Request $request){

    $notices = DB::select('SELECT proje.id as proje_id,proje.name as proje_name, ANY_VALUE(resimler.image_name) as image_name, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
    FROM proje
    INNER JOIN resimler ON proje.id = resimler.proje_id
    LEFT JOIN resim_rating ON resim_rating.resim_id = resimler.id
    GROUP BY resimler.id ,proje.id ORDER BY proje.id DESC');

    $notices = $this->arrayPaginator($notices, $request);

    return view('projeler')->with('projeler', $notices);

    }

    public function arrayPaginator($array, $request)
    {
        $page = Input::get('page', 1);
        $perPage = 6;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }


}
