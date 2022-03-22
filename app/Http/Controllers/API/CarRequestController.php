<?php

namespace App\Http\Controllers\API;

use App\Models\CarRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\DB;



class CarRequestController extends Controller
{

    public function index()
    {
        $OnHoldReq=CarRequest::whereNull('drivername')->get();
        return response()->json($OnHoldReq,200);
    }



    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'userphonenumber'=>'required',
            'userlocation'=>'required',
        ]);

        $carReq = new CarRequest;
        $carReq->username=$request->username;
        $carReq->userlocation=$request->userlocation;
        $carReq->userphonenumber=$request->userphonenumber;
        $save =$carReq->save();
        return response()->json($carReq,200);

    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'drivername'=>'required',
            'driverphonenumber'=>'required',
            'driverlocation'=>'required',
        ]);

        $update= DB::table('carrequests')->where('id',$id)->update([
            'drivername'=>$request->drivername,
            'driverlocation'=>$request->driverlocation,
            'driverphonenumber'=>$request->driverphonenumber,
        ]);

        // return response()->json($request,200);
        return response()->json($id,200);
    }


    public function destroy($id)
    {
        $doneRequests=CarRequest::where('id',$id)->delete();
        return response()->json($id,200);
    }
}
