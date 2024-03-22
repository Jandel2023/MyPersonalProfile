<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    //

   public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

    
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Success');
        }

     
        return back()->with('error', 'Error Email or Password');
    }


    public function logout()
    {
        Auth::logout();
        return view('/welcome');
       
    }

}
