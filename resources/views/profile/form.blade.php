<div class="form-group {{ $errors->has('fax_id') ? 'has-error' : ''}}">
    <label for="fax_id" class="col-md-4 control-label">{{ 'College' }}</label>
    <div class="col-md-6">
        <select name="fax_id" class="form-control" id="fax_id" >
    @foreach ($colleges as $fax)
        <option value="{{ $fax->id }}" >{{ $fax->name }}</option>
    @endforeach
</select>
        {!! $errors->first('fax_id', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="col-md-4 control-label">{{ 'Course' }}</label>
    <div class="col-md-6">
        <select name="course_id" class="form-control" id="course_id" >
        @foreach ($courses as $key)
        <option value="{{ $key->id }}" >{{ $key->name }}</option>
    @endforeach
</select>
        {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
            <div class="col-md-offset-4 col-md-4">
            <textarea class="form-control" rows="5" style = "display:none;" name="user_id" type="textarea" id="user_id" value ="{{ Auth::User()->id }}">{{ Auth::User()->id}}</textarea>
            </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
