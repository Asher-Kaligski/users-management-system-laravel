<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {


        $customers = Customer::orderBy('id', 'desc')->take(5)->get();

        return view('home', ['customers' => $customers]);

    }

}