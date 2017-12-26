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
use App\NewsLike;
use App\InstructionLike;
use App\MaterialLike;

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

        $likes = NewsLike::where('usefull','=',1)->get();
        $dislikes = NewsLike::where('not_usefull','=',1)->get();

        $arrayLikes = array();
        foreach($news as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($likes as $like)    
                                        if($like->news_id == $post->id){                                            
                                            $i++;
                                        }
                                $arrayLikes[$post->id] = $i;
                                }                                           

        $arrayDislikes = array();
        foreach($news as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($dislikes as $like)    
                                        if($like->news_id == $post->id){                                            
                                            $i++;
                                        }
                                $arrayDislikes[$post->id] = $i;
                                }                                           

        return view('news',compact('UCC','courses','news','users','arrayLikes','arrayDislikes'));
    }

    public function showInstructions()
    {
        $user = Auth::user();
        $users = User::orderBy('name','asc')->get();
        $UCC = UsersCollegesAndCourses::where('user_id','=',$user->id)->get();
        $courses = Course::orderBy('name','asc')->get();
        $instructions = Instruction::orderBy('id','asc')->get();

        $likes = InstructionLike::where('usefull','=',1)->get();
        $dislikes = InstructionLike::where('not_usefull','=',1)->get();

        $arrayLikes = array();
        foreach($instructions as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($likes as $like)    
                                        if($like->instructions_id == $post->id){                                            
                                            $i++;                                           
                                        }
                                $arrayLikes[$post->id] = $i;
                                }                                           

        $arrayDislikes = array();
        foreach($instructions as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($dislikes as $like)    
                                        if($like->instructions_id == $post->id){                                            
                                            $i++;
                                        }
                                $arrayDislikes[$post->id] = $i;                                
                                }                            
        return view('instructions',compact('UCC','courses','instructions','users','arrayLikes','arrayDislikes'));
    }

    public function showMaterials()
    {
        $user = Auth::user();
        $users = User::orderBy('name','asc')->get();
        $UCC = UsersCollegesAndCourses::where('user_id','=',$user->id)->get();
        $courses = Course::orderBy('name','asc')->get();
        $materials = Material::orderBy('id','asc')->get();
        $likes = MaterialLike::where('usefull','=',1)->get();
        $dislikes = MaterialLike::where('not_usefull','=',1)->get();

        $arrayLikes = array();
        foreach($materials as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($likes as $like)    
                                        if($like->materials_id == $post->id){                                            
                                            $i++;
                                        }
                                $arrayLikes[$post->id] = $i;
                                }                                           

        $arrayDislikes = array();
        foreach($materials as $post)
            foreach($UCC as $ucc)
                foreach($courses as $course)
                    foreach($users as $user)
                        if($post->course == $ucc->course_id)
                            if($post->user_id == $user->id)
                                if($post->course == $course->id) 
                                {  
                                    $i=0;
                                    foreach($dislikes as $like)    
                                        if($like->materials_id == $post->id){                                            
                                            $i++;
                                        }
                                $arrayDislikes[$post->id] = $i;
                                }              
        return view('materials',compact('UCC','courses','materials','users','arrayLikes','arrayDislikes'));
    }

    public function likeNews(Request $req){
        
        $user = Auth::user();
        $postID = $req['post_id'];
        $newsLike = NewsLike::where('user_id','=', $user->id)->get();
        
        if($req['usefull'] == '1')             
            $req['notusefull'] = 0;
        if($req['notusefull'] == '1')             
            $req['usefull'] = 0;
        
        foreach($newsLike as $like)
        {                     
           if($like->news_id == $postID){               
                if($like->usefull == '1' && $like->not_usefull == '0' && $req['usefull'] == 1)
                    return redirect('news')->with('flash_message', 'Already liked!');
                else if($like->not_usefull == '1' AND $like->usefull == '0' && $req['notusefull'] == 1)                
                    return redirect('news')->with('flash_message', 'Already disliked!');
            }                       
        } 

        NewsLike::create([
            'user_id' => $user->id,
            'news_id' => $postID,
            'usefull' => $req['usefull'],
            'not_usefull' => $req['notusefull'],
        ]);
    
        return redirect('news'); 

    }

    public function likeInstruction(Request $req){
        
        $user = Auth::user();
        $postID = $req['post_id'];
        $newsLike = InstructionLike::where('user_id','=', $user->id)->get();
        
        if($req['usefull'] == '1')             
            $req['notusefull'] = 0;
        if($req['notusefull'] == '1')             
            $req['usefull'] = 0;
        
        foreach($newsLike as $like)
        {                     
           if($like->instructions_id == $postID){               
                if($like->usefull == '1' && $like->not_usefull == '0' && $req['usefull'] == 1)
                    return redirect('instructions')->with('flash_message', 'Already liked!');
                else if($like->not_usefull == '1' AND $like->usefull == '0' && $req['notusefull'] == 1)                
                    return redirect('instructions')->with('flash_message', 'Already disliked!');
            }                       
        } 

        InstructionLike::create([
            'user_id' => $user->id,
            'instructions_id' => $postID,
            'usefull' => $req['usefull'],
            'not_usefull' => $req['notusefull'],
        ]);
    
        return redirect('instructions'); 

    }

    public function likeMaterial(Request $req){
        
        $user = Auth::user();
        $postID = $req['post_id'];
        $newsLike = MaterialLike::where('user_id','=', $user->id)->get();
        
        if($req['usefull'] == '1')             
            $req['notusefull'] = 0;
        if($req['notusefull'] == '1')             
            $req['usefull'] = 0;
        
        foreach($newsLike as $like)
        {                     
           if($like->materials_id == $postID){               
                if($like->usefull == '1' && $like->not_usefull == '0' && $req['usefull'] == 1)
                    return redirect('materials')->with('flash_message', 'Already liked!');
                else if($like->not_usefull == '1' AND $like->usefull == '0' && $req['notusefull'] == 1)                
                    return redirect('materials')->with('flash_message', 'Already disliked!');
            }                       
        } 

        MaterialLike::create([
            'user_id' => $user->id,
            'materials_id' => $postID,
            'usefull' => $req['usefull'],
            'not_usefull' => $req['notusefull'],
        ]);
    
        return redirect('materials'); 

    }
}


