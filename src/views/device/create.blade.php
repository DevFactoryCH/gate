@extends('layouts.admin')

@section('content')
  <div class="box box-primary">
    <div class="box-body">
      {{ Form::open(array('route' => $prefix . 'device.store')) }}

        <div class="form-group">
          {{ Form::label('name', trans('gate::device.name')) }}
          {{ Form::text('name', Input::get('name'), array('class' => 'form-control')) }}
          {{ $errors->first('name', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
          {{ Form::label('number', trans('gate::device.number')) }}
          {{ Form::text('number', Input::get('number'), array('class' => 'form-control')) }}
          {{ $errors->first('number', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
          {{ Form::label('token', trans('gate::device.token')) }}
          {{ Form::text('token', Input::get('token'), array('class' => 'form-control')) }}
          {{ $errors->first('token', '<span class="text-danger">:message</span>') }}
        </div>

        {{ Form::submit(trans('gate::device.add'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
  </div>
@stop
