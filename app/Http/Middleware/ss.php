<?php
namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class adminCheck {

    public function handle($request, Closure $next)
    {
        if (!Auth::user()->isAdmin()){
            // return whatever you want here, I'd redirect to homepage for example or some 401 page
        }

        return $next($request);
    }

}
//
// use Closure;
// use Auth;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Response;
// class AdminCheck {
//
//     public function handle($request, Closure $next)
//     {
//         if ( Auth::check())
//         {
//           $user_id = Auth::user()->id;
//           $check_have_before = DB::select("SELECT * FROM users where id = ?",[$user_id]);
//           // dd($check_have_before);
//           foreach ($check_have_before as $user) {
//             if ($user->role =="user") {
//               dd($user->role);
//               return $next($request);
//             }
//             else {
//               # code...
//                return redirect('admingiris');
//               return new Response(view('admin.index'));
//
//             }
//
//           }
//
//         }
//         else {
//           # code...
//           return redirect('/');
//
//         }
//     }
//
// }
