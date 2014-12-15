<?php
namespace Devfactory\Gate\Controllers;

use Response;

class ApiController extends \Devfactory\Gate\Controllers\GateController
{

  public function register()
  {

    $validator = Validator::make(Input::All(), Device::$rules);

    if ($validator->fails()) {
      return Response::api('Bad inputs', 400);
    }

    $device = new Device();
    $device->name = Input::get('name');
    $device->token = Input::get('token');
    $device->number = Input::get('number');
    $device->save();

    return Response::api('Device Created');
  }
}