<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackendController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('sucess','User Logout');
    }
}
