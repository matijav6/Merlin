<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AdministerUser;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\College;
use App\UsersCollegesAndCourses;

class AdministerUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $administerusers = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $administerusers = User::paginate($perPage);
        }
        
        return view('admin.administer-users.index', compact('administerusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $colleges = College::orderBy('name', 'asc')->get();
        $courses = Course::orderBy('name', 'asc')->get();        
        
        return view('admin.administer-users.create',compact('colleges','courses'));
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

        User::create([
            'name' => $requestData['name'],
            'email' => $requestData['email'],
            'password' => bcrypt($requestData['password']),
        ]);
        
        UsersCollegesAndCourses::create($requestData);
        return redirect('admin/administer-users')->with('flash_message', 'AdministerUser added!');
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
        //$administeruser = AdministerUser::findOrFail($id);
        $administeruser = User::findOrFail($id);
        return view('admin.administer-users.show', compact('administeruser'));
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
        //$administeruser = AdministerUser::findOrFail($id);
        $administeruser = User::findOrFail($id);
        $colleges = College::orderBy('name', 'asc')->get();  
        $courses = Course::orderBy('name', 'asc')->get();      
        return view('admin.administer-users.edit', compact('administeruser','colleges','courses'));
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
        
        //$administeruser = AdministerUser::findOrFail($id);
        $administeruser = User::findOrFail($id);
        $administeruser->update($requestData);
        
        return redirect('admin/administer-users')->with('flash_message', 'AdministerUser updated!');
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
        //AdministerUser::destroy($id);
        User::destroy($id);

        return redirect('admin/administer-users')->with('flash_message', 'AdministerUser deleted!');
    }
}
