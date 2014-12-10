<?php

namespace Devfactory\Gate\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Device extends Eloquent {

  protected $table = 'device';

  public static $rules = array(
    'name' => 'required',
    'token' => 'required',
    'number' => 'required',
  );

}