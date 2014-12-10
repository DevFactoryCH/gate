<?php
namespace Devfactory\Gate\Controllers;

use View;
use Input;
use Redirect;
use Validator;
use Config;

use Devfactory\Gate\Models\Message;
use Devfactory\Gate\Models\Device;

class MessageController extends \Devfactory\Gate\Controllers\GateController
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $messages = Message::all();

    return View::make('gate::message.index', compact('messages'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $devices  = Device::all();
    return View::make('gate::message.create', compact('devices'));
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $validator = Validator::make(Input::All(), Message::$rules);

    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $message = new Message();
    $message->device_id = Input::get('device');
    $message->message = Input::get('message');
    $message->numbers = Input::get('numbers');
    $message->sent = FALSE;
    $message->save();

    return Redirect::route($this->prefix . 'message.index');
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $message = Message::find($id);
    $devices  = Device::all();

    return View::make('gate::message.edit', compact('message', 'devices'));
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $validator = Validator::make(Input::All(), Message::$rules);

    if ($validator->fails()) {
      return Redirect::back()->withInput()->withErrors($validator);
    }

    $message = Message::find($id);
    $message->device_id = Input::get('device');
    $message->message = Input::get('message');
    $message->numbers = Input::get('numbers');
    $message->sent = FALSE;
    $message->save();

    return Redirect::route($this->prefix . 'message.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $message = Message::find($id);
    $message->delete();

    return Redirect::back();
  }


}
