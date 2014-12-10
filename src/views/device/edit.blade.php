@extends('layouts.admin')

@section('content')
  <div class="box box-primary">
    <div class="box-body">
      {{ Form::open(array('route' => array($prefix . 'device.update', $device->id), 'method' => 'PUT')) }}

        <div class="form-group">
          {{ Form::label('name', trans('gate::device.name')) }}
          {{ Form::text('name', $device->name, array('class' => 'form-control')) }}
          {{ $errors->first('name', '<span class="text-danger">:message</span>') }}
        </div>

       <div class="form-group">
          {{ Form::label('number', trans('gate::device.number')) }}
          {{ Form::text('number', $device->number, array('class' => 'form-control')) }}
          {{ $errors->first('number', '<span class="text-danger">:message</span>') }}
        </div>

       <div class="form-group">
          {{ Form::label('token', trans('gate::device.token')) }}
          {{ Form::text('token', $device->token, array('class' => 'form-control')) }}
          {{ $errors->first('token', '<span class="text-danger">:message</span>') }}
        </div>

        {{ Form::submit(trans('gate::device.edit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
  </div>
@stop
