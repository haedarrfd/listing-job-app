<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/listings')->with('success', 'You have Logged In!');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function index()
    {
        return view('login.index', [
            "title" => "Login Page"
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/listings')->with('success', 'You have Logged Out!');
    }
}
