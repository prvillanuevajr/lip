<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Finish;
use App\Lipstick;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $finishes = Finish::all();
        $lipsticks = Lipstick::with('brand', 'finish')->latest()->get();
        return view('welcome',compact('lipsticks','brands','finishes'));
    }
}
