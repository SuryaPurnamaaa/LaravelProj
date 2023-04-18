<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials, $request->input('remember'))) {
            // Authentication passed, redirect to /games with success flash message
            return redirect()->to('/games')->with('success', 'Login successful!')->cookie('remember_me', true, 1440);
        } else {
            // Authentication failed, redirect back to login with an error flash message
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

}
