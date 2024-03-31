<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class TestimonialController extends Controller
{

    //
    public function index(): View
    {
        //
     
        $testimonial = Testimonials::latest()->paginate(5);
        
        return view('testimonials.testimonials',compact('testimonial'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    // public function testimonial(){
    //     return view('testimonials');
    // }

    public function addnewtestimonial(){
        return view('testimonials.addnewtestimonial');
    }

    public function createtestimonial(Request $request)
{
    try {
        $request->validate([
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'author' => 'required',
            'job_title' => 'required',
        ]);

        $testimonial = new Testimonials();
        $testimonial->content = $request->content;
        $testimonial->author = $request->author;
        $testimonial->job_title = $request->job_title;

        // Check if a profile image is provided
        if ($request->hasFile('profile_img')) {
            $image = $request->file('profile_img');
            $path = $image->store('public/images');

            // Store only the relative path in the database
            $testimonial->profile_img = str_replace('public/', '', $path);
        }

        $testimonial->save();
        
        return back()->with('success', 'Testimonial added successfully');
    } catch (\Illuminate\Database\QueryException $e) {
        // Catch specific exceptions and provide appropriate error messages
        $errorCode = $e->errorInfo[1];

        if ($errorCode == 1062) {
            return redirect()->back()->with('error', 'Duplicate entry error occurred.');
        }

        // Handle other database exceptions if needed

        return redirect()->back()->with('error', 'An error occurred during testimonial creation.');
    }
}



public function destroy(Testimonials $testimonial): RedirectResponse
{
    $testimonial->delete();
     
    return redirect()->route('testimonial')
                    ->with('success','Testimonial deleted successfully');
}


public function update(Request $request, Testimonials $testimonial): RedirectResponse
{
    $request->validate([
        'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'content' => 'required',
        'author' => 'required',
        'job_title' => 'required',
    ]);

   // Check if a profile image is provided
   if ($request->hasFile('profile_img')) {
    $image = $request->file('profile_img');
    $path = $image->store('public/profile_images');
    $testimonial->profile_img = str_replace('public/', '', $path);
}

    $testimonial->content = $request->input('content');
    $testimonial->author = $request->input('author');
    $testimonial->job_title = $request->input('job_title');
    $testimonial->save();
    
    return redirect()->route('updatetestimonial',compact('testimonial'))
                    ->with('success','Testimonial updated successfully.');
}

// public function edit(Testimonials $testimonial): View
// {
//     //
//     return view('edittestimonial', compact('testimonial'));
// }

public function edit($id)
{
    $testimonial = Testimonials::findOrFail($id);
    return view('testimonials.edittestimonial', compact('testimonial'));
}


public function viewtowelcome(): View
{
    //
    $testimonials = Testimonials::all();
    
    return view('welcome',compact('testimonials'));
}



}
