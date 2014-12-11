<?php
namespace Devfactory\Gate\Controllers;

use Devfactory\Gate\Models\Message;
use Redirect;

class PushController extends \Devfactory\Gate\Controllers\GateController
{
  public function send(Message $message)
  {

    PushNotification::app('appNameIOS')
      ->to($message->device->token)
      ->send('Gate notify',
             array(
               'message' => $message->device->message,
               'numbers' => $message->device->numbers,
             )
            );

    $message->sent = true;
    $message->save();

    return Redirect::back();
  }
}