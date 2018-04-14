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

    $notices = DB::select('SELECT proje.id as proje_id,proje.name as proje_name,images.id as resim_id, ANY_VALUE(images.filename) as image_name, COUNT(resim_rating.rate) as _count,SUM(resim_rating.rate) as rate
    FROM proje
    INNER JOIN images ON proje.id = images.proje_id
    LEFT JOIN resim_rating ON resim_rating.resim_id = images.id
    GROUP BY images.id ,proje.id ORDER BY proje.id DESC');

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
