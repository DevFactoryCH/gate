<?php
namespace Devfactory\Gate\Controllers;

use Devfactory\Gate\Models\Message;

use Sly\NotificationPusher\PushManager,
  Sly\NotificationPusher\Adapter\Gcm as GcmAdapter,
  Sly\NotificationPusher\Collection\DeviceCollection,
  Sly\NotificationPusher\Model\Device,
  Sly\NotificationPusher\Model\Message as MessageSly,
  Sly\NotificationPusher\Model\Push
  ;

use Redirect;
use Config;

class PushController extends \Devfactory\Gate\Controllers\GateController
{
  public function send(Message $message)
  {


    if (Config::get('gate::production')) {
      $env = PushManager::ENVIRONMENT_PROD;
    } else {
      $env = PushManager::ENVIRONMENT_DEV;
    }

    $pushManager = new PushManager($env);

    $gcmAdapter = new GcmAdapter(
      array(
        'apiKey' => Config::get('gate::api_key'),
      ));

    $devices = new DeviceCollection(
      array(
        new Device($message->device->token)
      )
    );

    $messageApp = new MessageSly(
      array(
        'message' => $message->device->message,
        'numbers' => $message->device->numbers,
      )
    );

    $push = new Push($gcmAdapter, $devices, $messageApp);
    $pushManager->add($push);
    $pushManager->push();

    $message->sent = true;
    $message->save();

    return Redirect::back();
  }
}