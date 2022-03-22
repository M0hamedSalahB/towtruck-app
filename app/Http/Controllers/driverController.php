<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class driverController extends Controller
{
     public function driversignup()
    {
        return view('dirversignup');
    }

    public function driverrigester(Request $request)
    {


        //validation
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phonenumber'=>'required|starts_with:0|digits:11|unique:users',
            'password'=>'required|min:6',
            'ssn'=>'required|digits:14',
            'licenseplatenumber'=>'required',

        ]);

        //insert

        $user = new Driver;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;
        $user->password=Hash::make($request->password);
        $user->moneymade=0;
        $user->distancetraveld=0;
        $user->ssn=$request->ssn;
        $user->licenseplatenumber=$request->licenseplatenumber;
        $save =$user->save();


        if ($save) {
            $userinfo=Driver::where('email','=',$request->email)->first();
            $request->session()->put('loggeduser',$userinfo);
            return redirect('dashboard');
        }else {
            return back()->with('fail','Please try again');
        }

    }
}
