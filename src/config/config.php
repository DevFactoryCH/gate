<?php

return array(

  /*
	|--------------------------------------------------------------------------
	| Gate environement
	|--------------------------------------------------------------------------
	|
	| Setup for the environement
	|
	*/
  'production' => TRUE,

  /*
	|--------------------------------------------------------------------------
	| Gate route prefix
	|--------------------------------------------------------------------------
	|
	| You can use this param to set the prefix before the routes
	|
	*/
  'route_prefix' => 'admin',

  /*
	|--------------------------------------------------------------------------
	| Gate filter before
	|--------------------------------------------------------------------------
	|
	| You can set the filter who will be used to display the page
	|
	*/
  'filter_before' => 'admin-auth',

  /*
	|--------------------------------------------------------------------------
	| Gate layout extend
	|--------------------------------------------------------------------------
	|
	| You can use this param to set the layout to extend for the admin
	|
	*/
  'layout_extend' => 'gate::layout',

  /*
	|--------------------------------------------------------------------------
	| Gate apiKey
	|--------------------------------------------------------------------------
	|
	| You have to request an accèes to contact@devfactory.ch
	|
	*/
  'api_key' => '',

);