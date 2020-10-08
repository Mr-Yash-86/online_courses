<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about($value='')
    {
    	return view('frontend.about');
    }
}
