<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function index(){
        $user = Auth::user();

        if ($user) {
            return view('user', compact('user'));
        } else {
            return redirect()->route('login');
        }
    }
}
