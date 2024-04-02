<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\View\Components\Alert;


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
            $data = $request->validate([
                'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'content' => 'required',
                'job_title' => 'required',
                'author' => 'required',
            ]);
    
            if ($request->hasFile('profile_img')) {
                $profilePath = $request->file('profile_img')->store('testimonialprofile', 'public');
                $data['profile_img'] = $profilePath;
            }
    
            Testimonials::create($data);
    
            return redirect()->route('testimonial')->with('success', 'Testimonial added successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            
            if ($errorCode == 1062) {
                return back()->with('error', 'Duplicate entry error occurred.');
            }
    
            return back()->with('error', 'An error occurred during testimonial creation.');
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
    try {
        $data = $request->validate([
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'author' => 'required',
            'job_title' => 'required',
        ]);

        if ($request->hasFile('profile_img')) {
            $profilePath = $request->file('profile_img')->store('testimonialprofile', 'public');
            $data['profile_img'] = $profilePath;
        }

        $testimonial->update($data);

        return redirect()->route('testimonial', ['testimonial' => $testimonial])
                        ->with('success','Testimonial updated successfully.');
    } catch (\Illuminate\Database\QueryException $e) {
        // Handle database query exceptions if needed
        return redirect()->back()->with('error', 'An error occurred during testimonial update.');
    }
}




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
