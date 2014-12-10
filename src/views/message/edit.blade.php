@extends('layouts.admin')

@section('content')
  <div class="box box-primary">
    <div class="box-body">
      {{ Form::open(array('route' => array($prefix . 'message.update', $message->id), 'method' => 'PUT')) }}

        <div class="form-group">
          {{ Form::label('message', trans('gate::message.message')) }}
          {{ Form::textarea('message', $message->message, array('class' => 'form-control')) }}
          {{ $errors->first('message', '<span class="text-danger">:message</span>') }}
        </div>

         <div class="form-group">
          {{ Form::label('numbers', trans('gate::message.numbers')) }}
          {{ Form::textarea('numbers', $message->numbers, array('class' => 'form-control')) }}
          {{ $errors->first('numbers', '<span class="text-danger">:message</span>') }}
        </div>

        <div class="form-group">
          {{ Form::label('device', trans('gate::message.device')) }}
          {{ Form::select('device', $devices->lists('name', 'id'), $message->device_id, array('class' => 'form-control')) }}
          {{ $errors->first('device', '<span class="text-danger">:message</span>') }}
        </div>

        {{ Form::submit(trans('gate::message.edit'), array('class' => 'btn btn-primary')) }}

      {{ Form::close() }}
    </div>
  </div>
@stop
