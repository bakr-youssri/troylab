<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;

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
        $schools = School::all();
        $students = Student::all();
        return view('home', compact('schools', 'students'));
    }


}
