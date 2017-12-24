<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $profile->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="text" id="email" value="{{ $profile->email or ''}}" >
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="col-md-4 control-label">{{ 'Password' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="password" type="text" id="password" value="''}}" >
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax_id') ? 'has-error' : ''}}">
    <label for="fax_id" class="col-md-4 control-label">{{ 'College' }}</label>
    <div class="col-md-6">
        <select name="fax_id" class="form-control" id="fax_id" >
    @foreach (json_decode('{"technology": "Technology", "tips": "Tips", "health": "Health"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($profile->fax_id) && $profile->fax_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('fax_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="col-md-4 control-label">{{ 'Course' }}</label>
    <div class="col-md-6">
        <select name="course_id" class="form-control" id="course_id" >
    @foreach (json_decode('{"nekaj":"nekaj1"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($profile->course_id) && $profile->course_id == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
        {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
