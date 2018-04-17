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
    public function index(Request $request){
    $query = DB::SELECT('SELECT
                          proje.name AS proje_name,
                          proje.id AS proje_id,
                          COUNT(resim_rating.rate) AS _count,
                          SUM(resim_rating.rate) AS rate
                        FROM
                          proje
                        INNER JOIN
                          images ON images.proje_id = proje.id
                        LEFT JOIN
                          resim_rating ON resim_rating.resim_id = images.id
                        GROUP BY
                          proje.id
                        ORDER BY
                          proje.id DESC');

    $notices = DB::select('SELECT
                            proje.name as proje_name,
                            proje.id AS proje_id,
                            SUM(resim_rating.rate) AS rate,
                            COUNT(resim_rating.resim_id) AS _count,
                            images.id AS resim_id,
                            ANY_VALUE(images.filename) AS image_name
                          FROM
                            images
                          left JOIN
                            resim_rating ON resim_rating.resim_id = images.id
                          INNER JOIN
                            proje ON proje.id = images.proje_id
                            where proje.id in (SELECT proje.id FROM proje)
                          GROUP by images.id
                          ORDER by proje.id DESC
                          ');

    // $notices = $this->arrayPaginator($notices, $request);

    return view('projeler')->with('projeler', $notices)->with('names',$query);

    }
    public function arrayPaginator($array,$request)
    {
        $page = Input::get('page', 1);
        $perPage = 2;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }
    public function projeDetay(Request $request){
      $id = $request->proje_id;
      $query = DB::SELECT('SELECT
                            proje.name AS proje_name,
                            proje.id AS proje_id,
                            COUNT(resim_rating.rate) AS _count,
                            SUM(resim_rating.rate) AS rate
                          FROM
                            proje
                          INNER JOIN
                            images ON images.proje_id = proje.id
                          left JOIN
                            resim_rating ON resim_rating.resim_id = images.id
                            where proje.id =?
                          GROUP BY
                            proje.id
                          ORDER BY
                            proje.id DESC',[$id]);
      $notices = DB::SELECT('SELECT
                              proje.name as proje_name,
                              proje.id AS proje_id,
                              SUM(resim_rating.rate) AS rate,
                              COUNT(resim_rating.resim_id) AS _count,
                              images.id AS resim_id,
                              ANY_VALUE(images.filename) AS image_name
                            FROM
                              images
                            LEFT JOIN
                              resim_rating ON resim_rating.resim_id = images.id
                            INNER JOIN
                              proje ON proje.id = images.proje_id
                              where proje.id = ?
                            GROUP by images.id

                            ORDER by proje.id DESC',[$id]);
      return view('projects')->with('projeler', $notices)->with('names',$query);


    }
}
