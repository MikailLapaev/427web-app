<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegLogController extends Controller
{
    public function create()
    {
        return view('pages.register');
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

    public function edit(){
        return view('pages.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        if(!Auth::attempt($credentials, true))
            return back()->withInput()->withErrors(['email' => 'Введены некорректные данные']);
        return redirect(route('home'));
    }

    public function logout(){
        Auth::logout();
        return redirect(route('home'));
    }
}
