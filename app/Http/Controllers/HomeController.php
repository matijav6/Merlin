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
        $user = Auth::user();
        $users = User::orderBy('name','asc')->get();
        $UCC = UsersCollegesAndCourses::where('user_id','=',$user->id)->get();
        $courses = Course::orderBy('name','asc')->get();
        $news = News::orderBy('id','asc')->get();

        return view('news',compact('UCC','courses','news','users'));
    }

    public function showInstructions()
    {
        $user = Auth::user();
        $users = User::orderBy('name','asc')->get();
        $UCC = UsersCollegesAndCourses::where('user_id','=',$user->id)->get();
        $courses = Course::orderBy('name','asc')->get();
        $instructions = Instruction::orderBy('id','asc')->get();

        return view('instructions',compact('UCC','courses','instructions','users'));
    }

    public function showMaterials()
    {
        $user = Auth::user();
        $users = User::orderBy('name','asc')->get();
        $UCC = UsersCollegesAndCourses::where('user_id','=',$user->id)->get();
        $courses = Course::orderBy('name','asc')->get();
        $materials = Material::orderBy('id','asc')->get();

        return view('materials',compact('UCC','courses','materials','users'));
    }
}