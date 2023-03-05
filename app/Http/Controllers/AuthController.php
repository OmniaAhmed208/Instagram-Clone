<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

final class AuthController
{
    function register(){
        return view('auth.register');
    }

    function login(){
        return view('auth.login');
    }

    function loginAction(LoginRequest $request){
        if(auth()->attempt($request->validated())){
            return redirect()->route('profile.index',[
               auth()->user()->id
            ]);
        }
        else{

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    }
        

    function registerSave(RegisterRequest $request){

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login');
    }

    function logout(Request $request) {
        auth()->logout();
    
        return redirect('/login');
    }
}


