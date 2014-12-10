<?php
namespace Devfactory\Gate\Controllers;

use Config;
use View;

class GateController extends \BaseController
{
  protected $prefix;

  public function __construct() {
    $this->prefix = Config::get('gate::route_prefix');
    if (!empty($this->prefix)) {
      $this->prefix = $this->prefix . '.';
    }
    View::composer('gate::*', 'Devfactory\Gate\Composers\GateComposer');
  }
}
