<?php

namespace Devfactory\Gate\Composers;

use Config;

class GateComposer {
  public function compose($view) {
    $prefix = rtrim(Config::get('gate::route_prefix'), '.') . '.';
    $layout = (object) array(
      'extends' => Config::get('gate::config.layout.extends'),
      'header' => Config::get('gate::config.layout.header'),
      'content' => Config::get('gate::config.layout.content'),
    );
    $view->with(['prefix' => $prefix, 'layout' => $layout]);
  }
}