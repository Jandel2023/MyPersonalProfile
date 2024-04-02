<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Testimonials;
use App\Models\Portfolio;
use App\Models\Certificates;

class DashboardController extends Controller
{
    //
    public function dashboard(){

        $counttestimonials = Testimonials::count();
        $countspectator = User::where('role_name', 'Spectator') ->count();
        $countportfolio = Portfolio::count();
        $countcertificate = Certificates::count();


        return view('dashboard',compact('counttestimonials','countspectator','countportfolio','countcertificate'));
    }

}
