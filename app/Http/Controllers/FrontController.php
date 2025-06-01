<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index()
    {
        return view('front.index');
    }

    function part($id)
    {
        return view('front.part');
    }

    function blog($id)
    {
        return view('front.blog');
    }
}
