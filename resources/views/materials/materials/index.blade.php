@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Materials</div>
                    <div class="panel-body">
                        <a href="{{ url('/materials/create') }}" class="btn btn-success btn-sm" title="Add New Material">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>                       

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Course</th><th>Content</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($materials as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        @foreach($courses as $course)
                                        @if($item->course == $course->id)
                                        <td>{{ $course->name }}</td><td>{{ $item->content }}</td>                                                                                
                                        <td>                                            
                                            <a href="{{ url('/materials/' . $item->id . '/edit') }}" title="Edit materials"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/materials' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete materials" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif                                    
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $materials->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
