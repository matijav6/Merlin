<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\College;

use Illuminate\Http\Request;

class AdministerCoursesController extends Controller
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
            $administercourses = Course::where('name', 'LIKE', "%$keyword%")
                ->orWhere('aka', 'LIKE', "%$keyword%")
                ->orWhere('fax_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $administercourses = Course::paginate($perPage);
        }
        $colleges = College::orderBy('name','asc')->get();

        return view('admin.administer-courses.index', compact('administercourses','colleges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $colleges = College::orderBy('name','asc')->get();
        return view('admin.administer-courses.create',compact('colleges'));
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
        
        Course::create($requestData);

        return redirect('admin/administer-courses')->with('flash_message', 'AdministerCourse added!');
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
        $administercourse = Course::findOrFail($id);

        return view('admin.administer-courses.show', compact('administercourse'));
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
        $administercourse = Course::findOrFail($id);
        $colleges = College::orderBy('name','asc')->get();
        return view('admin.administer-courses.edit', compact('administercourse','colleges'));
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
        
        $administercourse = Course::findOrFail($id);
        $administercourse->update($requestData);

        return redirect('admin/administer-courses')->with('flash_message', 'AdministerCourse updated!');
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
        Course::destroy($id);

        return redirect('admin/administer-courses')->with('flash_message', 'AdministerCourse deleted!');
    }
}
