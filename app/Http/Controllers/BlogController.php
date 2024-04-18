<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    //
    public function index(): View
    {
        //
     
        $testimonial = Blog::latest()->paginate(5);
        
        return view('blogs.blog',compact('testimonial'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    // public function testimonial(){
    //     return view('testimonials');
    // }

    public function create(){
        return view('blogs.addnewblog');
    }

    public function blogview($id){

            $testimonial = Blog::findOrFail($id);
            // $testimonial = Blog::all();
            return view('blogs.blogview', compact('testimonial'));
        
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'image_blog' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'title' => 'required',
                'content' => 'required',
                'status' => 'required',
                'author' => 'required',
            ]);
    
            if ($request->hasFile('image_blog')) {
                $profilePath = $request->file('image_blog')->store('blogimage', 'public');
                $data['image_blog'] = $profilePath;
            }
    
            $blog = Blog::create($data);
    
            return redirect()->route('blogs.index')->with('success', 'Blog added successfully');
        } 
        catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            
            if ($errorCode == 1062) {
                return back()->with('error', 'Duplicate entry error occurred.');
            }
    
            return back()->with('error', 'An error occurred during blog creation.');
        }
    }
    



public function destroy(Blog $blog): RedirectResponse
{
    try {   
      
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete blog: ' . $e->getMessage());
    }
}


public function update(Request $request, Blog $blog): RedirectResponse
{
    try {
        $data = $request->validate([
            // 'image_blog' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
            'author' => 'required',
        ]);

        if ($request->hasFile('image_blog')) {
            $profilePath = $request->file('image_blog')->store('blogimage', 'public');
            $data['image_blog'] = $profilePath;
        }

        $blog->update($data);

        return redirect()->route('blogs.index')
                        ->with('success','Blog updated successfully.');
    } catch (\Illuminate\Database\QueryException $e) {
        // Handle database query exceptions if needed
        return redirect()->back()->with('error', 'An error occurred during testimonial update.');
    }
}




public function edit($id)
{
    $testimonial = Blog::findOrFail($id);
    return view('blogs.editblog', compact('testimonial'));
}




}
