<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                 return response()->json('email dose not exist',200);
                //  return back()->with('fail','email dose not exist');
             }elseif (Hash::check($request->password,$userinfo->password )) {
                return response()->json($userinfo,200);
                    //  $request->session()->put('loggeduser',$userinfo);
                    //  return redirect('dashboard');
             }else {
                return response()->json('Password in incorect',200);
                    //  return back()->with('fail','Password in incorect');

              }

         }else {
             if (Hash::check($request->password,$userinfo->password )) {
                //  $request->session()->put('loggeduser',$userinfo);
                //  return redirect('dashboard');
                return response()->json($userinfo,200);
             }else {
                //  return back()->with('fail','Password in incorect');
                return response()->json('Password in incorect',200);
             }
         }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function checkAPI(Request $request)
    // {
    //     $request->validate([
    //        'email'=>'required|email',
    //        'password'=>'required|min:6',
    //     ]);
    //     if ($request->email=='Admin@admin.com'&&$request->password=='Adminpass') {
    //         return redirect('admindashboard');
    //     }

    //     $userinfo=User::where('email','=',$request->email)->first();
    //     if (!$userinfo) {
    //             $userinfo=Driver::where('email','=',$request->email)->first();
    //         if (!$userinfo) {
    //             return back()->with('fail','email dose not exist');
    //         }elseif (Hash::check($request->password,$userinfo->password )) {

    //                 $request->session()->put('loggeduser',$userinfo);
    //                 return redirect('dashboard');
    //         }else {
    //                 return back()->with('fail','Password in incorect');

    //          }

    //     }else {
    //         if (Hash::check($request->password,$userinfo->password )) {
    //             $request->session()->put('loggeduser',$userinfo);
    //             return redirect('dashboard');
    //         }else {
    //             return back()->with('fail','Password in incorect');

    //         }
    //     }

    // }

}
