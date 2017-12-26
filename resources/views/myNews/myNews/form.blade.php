<div class="form-group {{ $errors->has('course') ? 'has-error' : ''}}">
    <label for="course" class="col-md-4 control-label">{{ 'Course' }}</label>
    <div class="col-md-6">
        <select name="course" class="form-control" id="course" >
            @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('course', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="col-md-4 control-label">{{ 'Content' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ $myNews->content or ''}}</textarea>
        {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
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
