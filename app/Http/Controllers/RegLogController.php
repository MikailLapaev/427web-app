<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegLogController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string|between:2,100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|between:6,50|confirmed',
        ]);

        User::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
            'role_id'=> 2,
        ]);
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials, true);
        return redirect(route('home'));
    }
}
