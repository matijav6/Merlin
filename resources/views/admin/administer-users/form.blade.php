@if($disable == 'true')
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="name" type="text" id="name" value="{{ $administeruser->name or ''}}" >
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="email" type="text" id="email" value="{{ $administeruser->email or ''}}" >
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="password" type="text" id="password" value="{{''}}" >
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>    
    <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
            </div>
        </div>
    @else
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="name" type="text" id="name" value="{{ $administeruser->name or ''}}" >
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="email" type="text" id="email" value="{{ $administeruser->email or ''}}" >
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="password" type="text" id="password" value="{{''}}" >
            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
        <div class="form-group {{ $errors->has('colleges') ? 'has-error' : ''}}">
            <label for="colleges" class="col-md-4 control-label">{{ 'Colleges' }}</label>
            <div class="col-md-6">
                <select name="fax_id" class="form-control" id="fax_id" >
                @foreach ($colleges as $college)
                <option value="{{ $college->id }}">{{ $college->name }}</option>
                @endforeach
        </select>
                {!! $errors->first('college', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('courses') ? 'has-error' : ''}}">
            <label for="courses" class="col-md-4 control-label">{{ 'Courses' }}</label>
            <div class="col-md-6">
                <select name="course_id" class="form-control" id="course_id" >
                    @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('courses', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
            <textarea class="form-control" rows="5" style = "display:none;" name="user_id" type="textarea" id="user_id" value ="{{ $administeruser->id or '' }}">{{ Auth::User()->id}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-md-4">
                <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
            </div>
        </div>
    @endif
