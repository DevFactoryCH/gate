Gate
======


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
),
```

##Configuration
```
 php artisan config:publish devfactory/gate
```

##Migration
```
 php artisan  migrate --package=devfactory/gate
```
