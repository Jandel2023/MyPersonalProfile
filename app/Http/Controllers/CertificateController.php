<?php

namespace App\Http\Controllers;
use App\Models\Certificates;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //
    public function index(){
        $certificate = Certificates::latest()->paginate(5);

        return view('certificates.certificates',compact('certificate'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('certificates.addnewcertificate');
    }

    public function store(Request $request){
        try {
            $data = $request->validate([
                'img_cert' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
               
            ]);
    
            if ($request->hasFile('img_cert')) {
                $profilePath = $request->file('img_cert')->store('Certificates', 'public');
                $data['img_cert'] = $profilePath;
            }
    
            $certificate = Certificates::create($data);
    
            return redirect()->route('certificates.index')->with('success', 'Certificate added successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            
            if ($errorCode == 1062) {
                return back()->with('error', 'Duplicate entry error occurred.');
            }
    
            return back()->with('error', 'An error occurred during testimonial creation.');
        }

    }

    public function update(Request $request, Certificates $certificate): RedirectResponse
    {
        try {
            $data = $request->validate([
                'img_cert' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                
            ]);
    
            if ($request->hasFile('img_cert')) {
                $profilePath = $request->file('img_cert')->store('Certificates', 'public');
                $data['img_cert'] = $profilePath;
            }
    
            $certificate->update($data);
    
            return redirect()->route('certificates.index')
                            ->with('success','Certificate updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database query exceptions if needed
            return redirect()->back()->with('error', 'An error occurred during testimonial update.');
        }
    }

    public function destroy(Certificates $certificate):RedirectResponse
    {
        try {   
      
            $certificate->delete();
            return redirect()->back()->with('success', 'Certificate deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete certificate: ' . $e->getMessage());
        }
    }

    public function edit($id)
{
    $certificate = Certificates::findOrFail($id);
    return view('certificates.editcertificate', compact('certificate'));
}
    
}
