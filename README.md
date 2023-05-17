Laravel wrapper for icrmaxell/RandomLib
============================================

This package provides a Laravel wrapper Facade for [RandomLib](https://github.com/ircmaxell/RandomLib).

Installation
------------

The package can be installed via composer

``` bash
$ composer require kletellier/lara-random
```

*[If you are using Laravel with auto-discovery, you can skip this step]* Then, add the service provider to your config/app.php file:

```php
// config/app.php

'providers' => [
    ...
    Kletellier\Random\RandomServiceProvider::class,
    ...
];
```

*[If you are using Laravelwith auto-discovery, you can skip this step]* If you want to use the facade, add this:

```php
// config/app.php

'aliases' => [
	  ...
        'Random' => Kletellier\Random\RandomFacade::class
    ...
]
```

This package comes with a config file, where you can define the generator strength.  

```bash
php artisan vendor:publish --provider="Kletellier\Random\RandomServiceProvider"
```
 

Usage
-----

```php
// Generate a random string that is 64 bytes in length.
$string = Random::generate(64);

// Generate a whole number between 0 and 100.
$int = Random::generateInt(0, 100);

// Generate a 64 character string.
$string = Random::generateString(64);
```

#### Random::generate($size)

Generate a random byte string of the requested size.


#### Random::generateInt($min = 0, $max = PHP_INT_MAX)

Generate a random integer with the given range. If range (`$max - $min`)
is zero, `$max` will be used.


#### Random::generateString($length, $characters = '')

Generate a random string of specified length.

This uses the supplied character list for generating the new result
string. The list of characters should be specified as a string containing
each allowed character.

If no character list is specified, the following list of characters is used:

    0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/


License
-------

This library is licensed under the MIT license. Please see [License file](LICENSE.md) for more information.