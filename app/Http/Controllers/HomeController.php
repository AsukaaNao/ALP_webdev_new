<?php

namespace App\Http\Controllers;

use App\Models\Event;

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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $events = Event::where('is_active', 1)->get();

    return view('home', ['events' => $events, 'pagetitle' => 'Onoe\'Iki Cafe Pacet']);
}
}
