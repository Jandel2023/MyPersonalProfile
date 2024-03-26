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
    public function users(){
        return view('users');
    }

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

         // Authenticate the user
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful
            $user = Auth::user();

    
        if (Auth::attempt($credentials)) {
            // return redirect('/dashboard')->with('success', 'Login Success');
            // Check the role name
            if ($user->role_name === 'Spectator') {
                // Redirect to the testimonial view
                return redirect()->route('testimonial');
            } else {
                // Redirect to a different view for other roles
                // You can replace 'dashboard' with the route name or URL of your choice
                return redirect()->route('dashboard');
            }
        }else {
            // Authentication failed, redirect back to login page with error message
            return redirect()->route('login')->with('error', 'Invalid credentials.');
        }
    }
    }

    public function logout()
    {
        Auth::logout();
        return view('/welcome');
       
    }


    public function new_signup(Request $request)
    {
       
        try { 
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',

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
