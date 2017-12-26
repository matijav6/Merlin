<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\College;
use App\Course;
use App\Instruction;
use App\Material;
use App\News;
use App\UsersCollegesAndCourses;

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
     * @return \Illuminate\Http\Response
     */
    public function showNews()
    {
        return view('news');
    }

    public function showInstructions()
    {
        return view('instructions');
    }

    public function showMaterials()
    {
        return view('materials');
    }
}