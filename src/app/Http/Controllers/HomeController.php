<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Displays home website.
     *
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        return view('client.index');
    }
}
