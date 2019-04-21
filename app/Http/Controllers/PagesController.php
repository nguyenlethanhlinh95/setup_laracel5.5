<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('front.pages.index');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }
}
