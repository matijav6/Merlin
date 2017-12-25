<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UsersCollegesAndCourses;
use App\User;
use App\College;
use App\Course;

use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        $perPage = 25;        
        $profile = Auth::user();
        $all = UsersCollegesAndCourses::where('user_id', '=', $profile->id)->get();
    
        $colleges = College::orderBy('name','asc')->get();
        $courses = Course::orderBy('name','asc')->get();
        return view('profile.index', compact('profile','all','colleges','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $colleges = College::orderBy('name','asc')->get();
        $courses = Course::orderBy('name','asc')->get();

        return view('profile.create',compact('colleges','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();        
        $data = UsersCollegesAndCourses::where('user_id' ,'=', Auth::user()->id)->get();
        $i = 0;
        foreach($data as $check){
            if($check->fax_id == $requestData['fax_id'] && $check->course_id == $requestData['course_id'])
            {
                return redirect('profile/create')->with('flash_message', 'Already exists!');
                $i++;
            }
        }
        if($i == 0)
            UsersCollegesAndCourses::create($requestData);

        return redirect('profile')->with('flash_message', 'Profile added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $profile = User::findOrFail($id);

        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $profile = User::findOrFail($id);
        $all = UsersCollegesAndCourses::where('user_id', '=', $profile->id)->get();       
        
        //$course = Course::findOrFail($course_id);        
        //$college = College::findOrFail($college_id);        
       // return view('profile.edit',  compact('profile','college','course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $profile = User::findOrFail($id);
        $profile->update($requestData);

        return redirect('profile')->with('flash_message', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $userID = Auth::user()->id;

        $delete = UsersCollegesAndCourses::orderBy('id','asc')->get();
        
        foreach($delete as $del){
            if($del->course_id = $id AND $del->user_id = $userID)
                $var = $del->id;
        }
        UsersCollegesAndCourses::destroy($var);
        return redirect('profile')->with('flash_message', 'Profile deleted!');
    }
}
