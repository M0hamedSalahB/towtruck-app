<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class dashboardController extends Controller
{
    public function profile()
    {
            return view('dashboard');
    }

    public function edit()
    {
        return view('update');
    }

    public function update(Request $request)
    {

        if ($request->input('email')!=session('loggeduser')['email']||$request->input('phonenumber')!=session('loggeduser')['phonenumber']) {


            if ($request->input('email')!=session('loggeduser')['email']&&$request->input('phonenumber')!=session('loggeduser')['phonenumber']) {
                $request->validate([
                    'name'=>'required',
                    'email'=>'required|email|unique:users',
                    'phonenumber'=>'required|starts_with:0|digits:11|unique:users',
                    'password'=>'required|min:6',
                ]);
            }


            if ($request->input('email')!=session('loggeduser')['email']) {
                $request->validate([
                    'name'=>'required',
                    'email'=>'required|email|unique:users',
                    'phonenumber'=>'required|starts_with:0|digits:11',
                    'password'=>'required|min:6',
                ]);
            }



            if ($request->input('phonenumber')!=session('loggeduser')['phonenumber']) {
                $request->validate([
                    'name'=>'required',
                    'email'=>'required|email',
                    'phonenumber'=>'required|starts_with:0|digits:11|unique:users',
                    'password'=>'required|min:6',
                ]);

            }
        }else {
            $request->validate([
                'name'=>'required',
                'email'=>'required|email|',
                'phonenumber'=>'required|starts_with:0|digits:11',
                'password'=>'required|min:6',
            ]);
        }

       $updating= DB::table('users')->where('id','=',$request->input('userid'))
                                    ->update([
                                        'name'=>$request->input('name'),
                                        'email'=>$request->input('email'),
                                        'phonenumber'=>$request->input('phonenumber'),
                                        'password'=>$request->input('password'),
                                    ]);

        session()->pull('loggeduser');
        $userinfo=User::where('email','=',$request->email)->first();
        $request->session()->put('loggeduser',$userinfo);


        return redirect('dashboard');

    }
}
