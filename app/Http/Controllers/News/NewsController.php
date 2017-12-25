<?php

namespace App\Http\Controllers\News;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use App\News;
use App\Course;
use Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
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
            $news = News::where('course', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $news = News::where('user_id','=',Auth::user()->id)->paginate();
        }

        $courses = Course::orderBy('id', 'desc')->get();     

        return view('news.news.index', compact('news','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $courses = Course::orderBy('id', 'desc')->get();
        
        return view('news.news.create', compact('courses'));
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
        
        News::create($requestData);

        return redirect('/news')->with('flash_message', 'News added!');
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
        $news = News::findOrFail($id);

        return view('news.news.show', compact('news'));
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
        $news = News::findOrFail($id);
        $courses = Course::orderBy('id', 'desc')->get();
                
        return view('news.news.edit', compact('news','courses'));
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
        
        $news = News::findOrFail($id);
        $news->update($requestData);

        return redirect('/news')->with('flash_message', 'News updated!');
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
        News::destroy($id);

        return redirect('/news')->with('flash_message', 'News deleted!');
    }
}
