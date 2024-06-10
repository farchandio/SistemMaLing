<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::get(); 
        $testimonials = Testimonial::get();
        

        return view ('frontend.homepage', compact('sliders', 'testimonials'));
    }
}
