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
  'Davibennun\LaravelPushNotification\LaravelPushNotificationServiceProvider',
),
```

```php
'aliases' => array(
    'PushNotification' => 'Davibennun\LaravelPushNotification\Facades\PushNotification'
)
```

##Configuration
```
 php artisan config:publish devfactory/gate
 php artisan config:publish davibennun/laravel-push-notification
```

Update the configuration for the laravel-push-notification
```
 <?php

return array(
    'gateAndroid' => array(
        'environment' =>'production',
        'apiKey'      =>'1234',
        'service'     =>'gcm'
    ),
    'gateAndroid' => array(
        'environment' =>'testing',
        'apiKey'      =>'4321',
        'service'     =>'gcm'
    ),
);
```

##Migration
```
 php artisan  migrate --package=devfactory/gate
```
