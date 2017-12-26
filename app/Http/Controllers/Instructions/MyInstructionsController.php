<?php

namespace App\Http\Controllers\Instructions;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\Instruction;
use Auth;
use Illuminate\Http\Request;

class MyInstructionsController extends Controller
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
            $myInstructions = Instruction::where('course', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $myInstructions = Instruction::where('user_id','=',Auth::user()->id)->paginate();
        }

        $courses = Course::orderBy('id', 'desc')->get();
        return view('myInstructions.myInstructions.index', compact('myInstructions', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        return view('myInstructions.myInstructions.create', compact('courses'));
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
        
        Instruction::create($requestData);

        return redirect('myInstructions')->with('flash_message', 'Instruction added!');
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
        $instruction = Instruction::findOrFail($id);

        return view('myInstructions.myInstructions.show', compact('instruction'));
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
        $instruction = Instruction::findOrFail($id);
        $courses = Course::orderBy('id', 'desc')->get();

        return view('myInstructions.myInstructions.edit', compact('instruction','courses'));
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
        
        $instruction = Instruction::findOrFail($id);
        $instruction->update($requestData);

        return redirect('myInstructions')->with('flash_message', 'Instruction updated!');
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
        Instruction::destroy($id);

        return redirect('myInstructions')->with('flash_message', 'Instruction deleted!');
    }
}
