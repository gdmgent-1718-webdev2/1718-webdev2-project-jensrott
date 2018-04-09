<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* Controller that handles the first page of the dashboard */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $title = 'Dashboard';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        return view('home', compact('title'));
    }
}
