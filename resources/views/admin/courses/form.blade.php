<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $administercourse->name or ''}}" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('aka') ? 'has-error' : ''}}">
    <label for="aka" class="col-md-4 control-label">{{ 'A.K.A' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="aka" type="text" id="aka" value="{{ $administercourse->aka or ''}}" >
        {!! $errors->first('aka', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fax_id') ? 'has-error' : ''}}">
    <label for="fax_id" class="col-md-4 control-label">{{ 'College' }}</label>
    <div class="col-md-6">
        <select name="fax_id" class="form-control" id="fax_id" >
    @foreach ($colleges as $college)
        <option value="{{ $college->id }}" >{{ $college->name }}</option>
    @endforeach
</select>
        {!! $errors->first('fax_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
