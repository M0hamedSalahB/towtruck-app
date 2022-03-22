<?php

namespace App\Http\Controllers;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;


class adminController extends Controller
{


    public function admindashboard()
    {
        $users=User::all();
        $drivers=Driver::all();
        session()->put('users',$users);
        session()->put('drivers',$drivers);
        return view('admindashboard');
    }

    public function delete(Request $request)
    {
        if ($user=User::where('email','=',$request->email)->first()) {
            $del=$user->delete();
            return back();
        }elseif ($user=Driver::where('email','=',$request->email)->first()) {
            $del=$user->delete();
            return back();
        }
    }

    public function adminupdate(Request $requset)
    {
        $updating= DB::table('drivers')->where('email','=',$requset->email)
                                    ->update([
                                        'licenseplatenumber'=>$requset->licenseplatenumber,
                                    ]);
                                    return back();
    }
}
