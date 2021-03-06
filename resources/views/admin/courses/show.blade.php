@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

        <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Course {{ $administercourse->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/courses') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/courses/' . $administercourse->id . '/edit') }}" title="Edit AdministerCourse"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/administercourses' . '/' . $administercourse->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete AdministerCourse" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $administercourse->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $administercourse->name }} </td></tr><tr><th> Aka </th><td> {{ $administercourse->aka }} </td></tr><tr><th> Fax Id </th><td> {{ $administercourse->fax_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
