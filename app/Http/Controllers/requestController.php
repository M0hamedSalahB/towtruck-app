<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\User;

class requestController extends Controller
{
    public function usersend(Request $request)
    {
        $drivers = Driver::all();
        foreach ($drivers as $driver) {
            //
        }

    }
}
