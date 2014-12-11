@extends('layouts.admin')

@section('content')

  <p>
    <a href="{{ route($prefix . 'message.create') }}" class="btn btn-primary">{{ trans('gate::message.add') }}</a>
  </p>

  <div class="box box-primary">
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>@lang('gate::message.device')</th>
            <th>@lang('gate::message.message')</th>
            <th>@lang('gate::message.sent')</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($messages as $message)
          <tr>
            <td>{{ $message->device->name }}</td>
            <td>{{ str_limit($message->message) }}</td>
            <td>{{ ($message->sent) ? trans('gate::message.sent') : trans('gate::message.notsent') }}</td>
            <td class="text-right">
              {{ Form::open(array('route' => array('gate.push', $message->id), 'method' => 'POST', 'class' => 'btn-group')) }}
                {{ Form::submit(trans('gate::message.push'), array('class' => 'btn btn-xs')) }}
              {{ Form::close() }}
              {{ Form::open(array('route' => array($prefix . 'message.destroy', $message->id), 'method' => 'DELETE', 'class' => 'btn-group')) }}
                <a href="{{ route($prefix . 'message.edit', $message->id) }}" class="btn btn-success btn-xs">
                  @lang('gate::message.edit')
                </a>
                {{ Form::submit(trans('gate::message.delete'), array('class' => 'btn btn-danger btn-xs')) }}
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@stop
