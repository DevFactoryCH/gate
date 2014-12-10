<?php

namespace Devfactory\Gate\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Message extends Eloquent {

  protected $table = 'message';

  public static $rules = array(
    'message' => 'required',
    'numbers' => 'required',
    'device' => 'required',
  );

  public function device() {
    return $this->hasOne('Devfactory\Gate\Models\Device', 'id', 'device_id');
  }

  public function isSent() {
    return ($this->sent) ? TRUE : FALSE;
  }
}