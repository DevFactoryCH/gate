<?php
namespace Devfactory\Gate\Controllers;

use View;
use Input;
use Redirect;
use Validator;
use Config;

use Devfactory\Gate\Models\Device;

class DeviceController extends \Devfactory\Gate\Controllers\GateController
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $devices = Device::all();

    return View::make('gate::device.index', compact('devices'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('gate::device.create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $validator = Validator::make(Input::All(), Device::$rules);

    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $device = new Device();
    $device->name = Input::get('name');
    $device->token = Input::get('token');
    $device->number = Input::get('number');
    $device->save();

    return Redirect::route($this->prefix . 'device.index');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $device = Device::find($id);

    return View::make('gate::device.edit', compact('device'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $validator = Validator::make(Input::All(), Device::$rules);

    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $device = Device::find($id);
    $device->name = Input::get('name');
    $device->token = Input::get('token');
    $device->number= Input::get('number');
    $device->save();

    return Redirect::route($this->prefix . 'device.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $device = Device::find($id);
    $device->delete();

    return Redirect::back();
  }


}
