<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $administercollege->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('aka') ? 'has-error' : ''}}">
    <label for="aka" class="col-md-4 control-label">{{ 'Aka' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="aka" type="text" id="aka" value="{{ $administercollege->aka or ''}}" >
        {!! $errors->first('aka', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('county_id') ? 'has-error' : ''}}">
    <label for="county_id" class="col-md-4 control-label">{{ 'County' }}</label>
    <div class="col-md-6">
        <select name="county_id" class="form-control" id="county_id" >
        @foreach ($countys as $county)
        <option value="{{ $county->id }}">{{ $county->name }}</option>
        @endforeach
</select>
        {!! $errors->first('county_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
