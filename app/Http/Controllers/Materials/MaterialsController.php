<?php

namespace App\Http\Controllers\Materials;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Material;
use App\Course;
use Auth;
use Illuminate\Http\Request;

class MaterialsController extends Controller
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
            $materials = Material::where('course', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $materials = Material::where('user_id','=',Auth::user()->id)->paginate();
        }
        $courses = Course::orderBy('id', 'desc')->get();     
        return view('materials.materials.index', compact('materials','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $courses = Course::orderBy('id', 'desc')->get();   
        return view('materials.materials.create', compact('courses'));
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
        
        Material::create($requestData);

        return redirect('/materials')->with('flash_message', 'Material added!');
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
        $material = Material::findOrFail($id);

        return view('materials.materials.show', compact('material'));
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
        $material = Material::findOrFail($id);
        $courses = Course::orderBy('id', 'desc')->get();   
        return view('materials.materials.edit', compact('material','courses'));
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
        
        $material = Material::findOrFail($id);
        $material->update($requestData);

        return redirect('/materials')->with('flash_message', 'Material updated!');
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
        Material::destroy($id);

        return redirect('/materials')->with('flash_message', 'Material deleted!');
    }
}
