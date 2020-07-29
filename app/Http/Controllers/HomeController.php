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
    public function index()
    {
        return view('layouts.pegawais.app');
    }
    public function adminHome()
    {
        return view('layouts.admins.app');
    }
    public function atasanHome()
    {
        return view('layouts.atasans.app');
    }
}
