<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    function register(){
        return view('auth.register');
    }

    function login(){
        return view('auth.login');
    }

    function loginAction(Request $request){
       $validated = $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::query()->firstWhere('email', $request->email);
        if ($user != null){
            Auth::login($user);

            if (Auth::check()){
                $request->session()->regenerate();
                return redirect()->route('profile.index');
            }

        }else{
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
            // return 'Nullllllllllll';
        }

    }
        

    function registerSave(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required'

        ]);
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password

        ]);

        return redirect()->route('login');
    }

    function logout(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');

    }
}


