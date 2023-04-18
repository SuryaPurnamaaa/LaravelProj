<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validate form input
        $validatedData = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User();
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Redirect to the desired page after successful registration
        return redirect('/')->with('success', 'Registration successful!');
    }
}
