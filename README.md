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

##Routes Admin
You have those routes for the admin

```
[route_prefix]/device  //Where you can register your device who have the android app installed
[route_prefix]/message //Where you can send some sms using the android app
```

##Routes Services

The `{format}` can be `json` or `xml`

```
PUT [route_services_prefix]/gate/register.{format}
```


####Parameters

| Name          | Type          | Description  |
| ------------- |:-------------:| :-----|
| name          | string        | **Required.** The name of the device |
| token         | string        | **Required.** The token of the device used for the push notification |
| number        | string        | **Required.** The phone number of the device |



####Example
```
{
  "name": "test-phone1",
  "token": "12kdi24kkk3233mk23n23n2",
  "number": "0845668955"
}
```

####Response
```
Status: 200 OK
Content-Type: text/html
___
["Device Created"]
```

####Bad Response
```
Status: 400 Bad Request
Content-Type: text/html
___
["Bad inputs"]
```
