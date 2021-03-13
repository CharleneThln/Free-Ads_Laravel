<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function dashboard() {

        $ads = Ad::all();
        $user = Auth::user();

        return view('userdashboard', [
            "ads" => $ads, 
            "user" => $user
        ]);
    }



}
