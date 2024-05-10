<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller{
    public function index(){
        return view('login1');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $user = Auth::user();

            if ($user->user_type === 'artist') {
                $user->alias = $request->input('alias');
                $user->save();
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'message' => 'Invalid username or password.',
        ]);
    }
}
