<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CertificateController extends Controller
{
    //
    public function certificates(){
        return view('certificates');
    }
}
