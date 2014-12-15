<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$prefix = Config::get('gate::route_prefix');
$before = Config::get('gate::filter_before');

Route::group(array('prefix' => $prefix, 'before' => $before), function() use ($prefix) {

  Route::resource('device', 'Devfactory\Gate\Controllers\DeviceController');
  Route::resource('message', 'Devfactory\Gate\Controllers\MessageController');

  Route::model('message', 'Devfactory\Gate\Models\Message');
  Route::post('push/{message}', array('as' => 'gate.push', 'uses' => 'Devfactory\Gate\Controllers\PushController@send'));
});

$prefix_service = Config::get('gate::route_services_prefix');

Route::group(array('prefix' => $prefix_service . 'gate'), function()
{
    Route::put('register.{format}', 'Devfactory\Gate\Controllers\ApiController@register');
});
