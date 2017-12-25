@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>
                    <div class="panel-body">    
                    <a href="{{ url('/profile/create') }}" class="btn btn-success btn-sm" title="Add New Material">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </a>                                
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Name</th><th>Email</th><th>Colleges</th><th>Courses</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>   
                                @foreach($all as $ucc)
                                @foreach($courses as $course)
                                @foreach($colleges as $college)
                                @if($ucc->course_id == $course->id)
                                @if($course->fax_id == $college->id)
                                    <tr>                                       
                                        <td>{{ $profile->name }}</td><td>{{ $profile->email }}</td><td>{{ $college->name }}</td><td>{{ $course->name }}</td>
                                        <td>                                                                                       
                                            <form method="POST" action="{{ url('/profile' . '/' . $course->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Profile" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>    
                                    @endif                                 
                                    @endif
                                    
                                    @endforeach 
                                    @endforeach  
                                     @endforeach                               
                                </tbody>
                            </table>                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
