<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class signupController extends Controller
{
    public function signup()
    {
        return view("signup");
    }
    public function register(Request $request)
    {
        //validation
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phonenumber'=>'required|starts_with:0|digits:11|unique:users',
            'password'=>'required|min:6',

        ]);

        //insert

        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;
        $user->password=Hash::make($request->password);
        $user->moneyspent=0;
        $user->distancetraveld=0;
        $save =$user->save();


        if ($save) {
            $userinfo=User::where('email','=',$request->email)->first();
            $request->session()->put('loggeduser',$userinfo);
            return redirect('dashboard');
        }else {
            return back()->with('fail','Please try again');
        }
    }
}
