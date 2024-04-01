<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PortfolioController extends Controller
{
    //
    public function index(): View
    {
        //
     
        $portfolio = Portfolio::latest()->paginate(5);
        
        return view('portfolios.portfolio',compact('portfolio'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function addnewportfolio(){
        return view('portfolios.addnewportfolio');
    }

    public function createportfolio(Request $request)
{
    try {
       $data = $request->validate([
            'portfolio_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_type' => 'required',
            'portfolio_title' => 'required',
            'portfolio_url' => 'required',
        ]);

      
        // Check if a profile image is provided
        if ($request->hasFile('portfolio_img')) {
            $profilePath = $request->file('portfolio_img')->store('portfolioimage', 'public');
            $data['portfolio_img'] = $profilePath;
        }

        Portfolio::create($data);
        
        return redirect()->route('portfolio')->with('success', 'Portfolio added successfully');
    } catch (\Illuminate\Database\QueryException $e) {
        // Catch specific exceptions and provide appropriate error messages
        $errorCode = $e->errorInfo[1];

        if ($errorCode == 1062) {
            return redirect()->back()->with('error', 'Duplicate entry error occurred.');
        }

        // Handle other database exceptions if needed

        return redirect()->back()->with('error', 'An error occurred during portfolio creation.');
    }
}



public function destroy(portfolio $portfolio): RedirectResponse
{
    $portfolio->delete();
     
    return redirect()->route('portfolio')
                    ->with('success','Portfolio deleted successfully');
}


public function update(Request $request, Portfolio $portfolio): RedirectResponse
{
   $data = $request->validate([
        'portfolio_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'portfolio_type' => 'required',
        'portfolio_title' => 'required',
        'portfolio_url' => 'required',
    ]);

   // Check if a profile image is provided
   if ($request->hasFile('portfolio_img')) {
    $profilePath = $request->file('portfolio_img')->store('portfolioimage', 'public');
    $data['portfolio_img'] = $profilePath;
}

$portfolio->update($data);
    
    return redirect()->route('portfolio',compact('portfolio'))
                    ->with('success','Portfolio updated successfully.');
}

// public function edit(Testimonials $testimonial): View
// {
//     //
//     return view('edittestimonial', compact('testimonial'));
// }

public function edit($id)
{
    $portfolio = Portfolio::findOrFail($id);
    return view('portfolios.editnewportfolio', compact('portfolio'));
}



}
