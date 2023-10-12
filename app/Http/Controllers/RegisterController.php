<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Register Page"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => 'required|min:5|max:100|unique:users',
            "email" => 'required|email:dns',
            "password" => 'required|min:8|max:100'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        auth()->login($user);

        return redirect('/listings')->with('success', 'Registration successfull!');
    }
}
