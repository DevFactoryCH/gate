Gate
======

This app only work with Android

##How to setup

update `composer.json` file:

```json
{
    "require": {
        "devfactory/gate": "1.0.*"
    }
}
```

and run `composer update` from terminal to download files.

update `app.php` file in `app/config` directory:

```php
'providers' => array(
  'Devfactory\Gate\GateServiceProvider',
  'Devfactory\Api\ApiServiceProvider',
),
```

```php
alias => array(
    'API'          => 'Devfactory\Api\Facades\ApiFacade',
),
```


##Configuration
```
 php artisan config:publish devfactory/gate
```

Update the configuration for the gate
```
 <?php


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
```

##Migration
```
 php artisan  migrate --package=devfactory/gate
```

##Routes
You have those routes

```
[route_prefix]/device  //Where you can register your device who have the android app installed
[route_prefix]/message //Where you can send some sms using the android app
```
