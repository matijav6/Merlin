@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>News of other people</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="row posts">
                        <div class="col-md-9 col-md-offset-3">                         
                            @foreach($news as $post)
                                @foreach($UCC as $ucc)
                                    @foreach($courses as $course)
                                        @foreach($users as $user)
                                            @if($post->course == $ucc->course_id)
                                                @if($post->user_id == $user->id)
                                                    @if($post->course == $course->id)                                                                                                                         
                                                        <article class="post">  
                                                            
                                                                <h3>{{ $course->name }} </h3>
                                                                <p> {{ $post->content }}</p>

                                                            <div class="info">
                                                                Posted by {{ $user->name }} on {{ Carbon\Carbon::parse($post->created_at)->format('d.m.Y @ H:i') }}
                                                            </div>

                                                            <div class="interaction row">
                                                                <form method="POST" action="{{ route('news.like') }}" accept-charset="UTF-8" class="form-horizontal col-md-3" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <div class="col-md-offset-4 col-md-4">
                                                                        <textarea class="form-control" rows="5" style = "display:none;" name="post_id" type="textarea" id="post_id" value ="{{  $post->id }}">{{ $post->id}}</textarea>
                                                                        </div>
                                                                    </div>                                                                    
                                                                    <input name="usefull" value="1" style="display:none;">
                                                                    <button type="submit" class="btn btn-outline-success btn-xs" title="Usefull News" id="usefull" value="1" ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$arrayLikes[$post->id]}} Usefull</button>
                                                                    {{ csrf_field() }} 
                                                                </form>
                                                                <form method="POST" action="{{ route('news.like') }}" accept-charset="UTF-8" class="form-horizontal col-md-3" enctype="multipart/form-data">
                                                                    <div class="form-group">
                                                                        <div class="col-md-offset-4 col-md-4">
                                                                        <textarea class="form-control" rows="5" style = "display:none;" name="post_id" type="textarea" id="post_id" value ="{{  $post->id }}">{{ $post->id}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <input name="notusefull" value="1" style="display:none;">
                                                                    <button type="submit" class="btn btn-outline-success btn-xs" title="Usefull News" id="notusefull" value="1" ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$arrayDislikes[$post->id]}} Not usefull</button>
                                                                    {{ csrf_field() }} 
                                                                </form>
                                                            </div>
                                                        </article>

                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        </div>
                    </section>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
