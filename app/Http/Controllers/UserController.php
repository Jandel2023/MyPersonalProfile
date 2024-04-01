<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use App\Models\Certificates;
use App\Models\Portfolio;
use App\Models\Testimonials;
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
        return view('users.users');
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

    public function editprofile(): View
    {
        //
        $user = Auth::user();
        return view('editprofile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateprofile(Request $request): RedirectResponse
    {
        try{
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . $user->id,
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


    // Check if a profile image is provided
    if ($request->hasFile('profile_image')) {
        $image = $request->file('profile_image');
        $path = $image->store('public/profile_images');
        $user->profile_image = str_replace('public/', '', $path);
    }

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    
    $user->save();


    return back()->with('success', 'Profile updated successfully');
}
    catch (\Illuminate\Database\QueryException $e) 
    {
        // Catch the exception for duplicate entry error
        $errorCode = $e->errorInfo[1];

        if ($errorCode == 1062) {
            // Handle duplicate entry error, for example, redirect back with an error message
            return redirect()->back()->with('error', 'Duplicate entry for email.');
        }

        return redirect()->back()->with('error', 'An error occurred during registration.');
    }
      
     }



   
     public function changepass():View
     {
        $user = Auth::user();
        return view('users/changepassword',compact('user'));
     }





     public function changepassword(Request $request): RedirectResponse
     {
        $user = Auth::user();

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required', // You can adjust the validation rules as needed
            'confirmpass' => 'required',
        ]);

         // Check if the old password matches the current password
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password does not match.');
        }

         // Check if the new password and confirm password match
         if ($request->newpassword !== $request->confirmpass) {
            return redirect()->back()->with('error', 'New password and confirm password do not match.');
        }

         // Update the user's password
         $user->password = Hash::make($request->newpassword);
         $user->update();
 
         return redirect()->back()->with('success', 'Password updated successfully.');

     }


     public function viewtowelcome(): View
     {
         //
         $testimonials = Testimonials::all();
         $portfolios = Portfolio::all();
         $blogs = Blog::all();
        $certificates = Certificates::all();
        $countcert = Certificates::count();
     
         return view('welcome',compact('testimonials','portfolios','blogs','certificates','countcert'));
     }


}
