<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Testimonials;

class DashboardController extends Controller
{
    //
    public function dashboard(){

        $counttestimonials = Testimonials::count();
        $countspectator = User::where('role_name', 'Spectator') ->count();


        return view('dashboard',compact('counttestimonials','countspectator'));
    }

}
