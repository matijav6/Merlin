@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Materials of other people</h3></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <section class="row posts">
                        <div class="col-md-9 col-md-offset-3">                        
                            @foreach($materials as $post)
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
                                                                Posted by {{ $user->name }} on {{ Carbon\Carbon::parse($post->created_at)->format('d.m.Y @ h:i') }}
                                                            </div>

                                                            <div class="interaction">
                                                                <a href="#" class="like btn btn-outline-success">Usefull</a>
                                                                <a href="#" class="dislike btn btn-outline-danger">Not usefull</a>                                       
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
