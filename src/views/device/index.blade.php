@extends('layouts.admin')

@section('content')

  <p>
    <a href="{{ route($prefix . 'device.create') }}" class="btn btn-primary">{{ trans('gate::device.add') }}</a>
  </p>

  <div class="box box-primary">
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>@lang('gate::device.name')</th>
            <th>@lang('gate::device.number')</th>
            <th>@lang('gate::device.token')</th>
            <th></th>
          </tr>
        </thead>
        @foreach ($devices as $device)
          <tr>
            <td>{{ $device->name }}</td>
            <td>{{ $device->number }}</td>
            <td>{{ $device->token }}</td>
            <td class="text-right">
              {{ Form::open(array('route' => array($prefix . 'device.destroy', $device->id), 'method' => 'DELETE', 'class' => 'btn-group')) }}
                <a href="{{ route($prefix . 'device.edit', $device->id) }}" class="btn btn-success btn-xs">
                  @lang('gate::device.edit')
                </a>
                {{ Form::submit(trans('gate::device.delete'), array('class' => 'btn btn-danger btn-xs')) }}
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  </div>
@stop
