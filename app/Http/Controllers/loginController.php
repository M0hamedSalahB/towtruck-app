<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnArgument;

class loginController extends Controller
{
    public function login()
    {
       return view("login");
    }

    public function check(Request $request)
    {
        $request->validate([
           'email'=>'required|email',
           'password'=>'required|min:6',
        ]);
        if ($request->email=='Admin@admin.com'&&$request->password=='Adminpass') {
            return redirect('admindashboard');
        }

        $userinfo=User::where('email','=',$request->email)->first();
        if (!$userinfo) {
                $userinfo=Driver::where('email','=',$request->email)->first();
            if (!$userinfo) {
                return back()->with('fail','email dose not exist');
            }elseif (Hash::check($request->password,$userinfo->password )) {

                    $request->session()->put('loggeduser',$userinfo);
                    return redirect('dashboard');
            }else {
                    return back()->with('fail','Password in incorect');

             }

        }else {
            if (Hash::check($request->password,$userinfo->password )) {
                $request->session()->put('loggeduser',$userinfo);
                return redirect('dashboard');
            }else {
                return back()->with('fail','Password in incorect');

            }
        }

    }

}
