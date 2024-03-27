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
    public function users(): view
    {
        return view('users');
    }

   public function login(): view
    {
        
        return view('login');
    }



    public function signup(): view
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
            $user = Auth::user();
                if (Auth::attempt($credentials)) {
                    if ($user->role_name == 'Spectator') {
                        return redirect()->route('testimonial');
                    } else {
                        return redirect()->route('dashboard');
                    }
                }
                    
            }
            return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('status', 'You have been logged out.');
       
    }


    public function new_signup(Request $request): RedirectResponse
    {
       
        try { 
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',

            ]);

                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->role_name = "Spectator";
                $user->password = Hash::make($request->password);



                $user->save();
                return back()->with('success', 'Sign-up successfully');
            }
            
        catch (\Illuminate\Database\QueryException $e) 
            {
                // Catch the exception for duplicate entry error
                $errorCode = $e->errorInfo[1];

                if ($errorCode == 1062) {
                    // Handle duplicate entry error, for example, redirect back with an error message
                    return redirect()->back()->with('error', 'Duplicate entry for email.');
                }

                return redirect()->back()->with('error', 'An error occurred during Sign-up.');
            }
    }

}
