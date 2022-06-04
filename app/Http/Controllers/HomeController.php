<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('website.pages.home');
    }
    public function about(){
        return view('website.pages.about');
    }
    public function contact(){
        return view('website.pages.contact');
    }
    public function product(){
        return view('website.pages.product');
    }
}
