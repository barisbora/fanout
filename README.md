# Laravel 5 Fanout.io Web Socket Service

[![Latest Stable Version](https://poser.pugx.org/barisbora/fanout/v/stable.svg)](https://packagist.org/packages/barisbora/fanout) [![License](https://poser.pugx.org/barisbora/fanout/license.svg)](https://packagist.org/packages/barisbora/fanout)


A simple [Laravel 5](http://www.laravel.com/) service provider for [Fanout](http://www.fanout.io).

## Installation

The Laravel 5 Fanout Service Provider can be installed via [Composer](http://getcomposer.org) by requiring the
`barisbora/fanout` package in your project's `composer.json`.

```
composer require barisbora/fanout
```

## Configuration

To use the Fanout Service Provider, you must register the provider when bootstrapping your Laravel application.

Find the `providers` key in your `config/app.php` and register the Service Provider.

```php
    'providers' => [
        // ...
        barisbora\Fanout\FanoutServiceProvider::class,
    ],
```

Find the `aliases` key in your `config/app.php` and register the Facade.
```php
    'aliases' => [
        // ...
        'Fanout'    => barisbora\Fanout\Facades\FanoutFacade::class,
    ],
```

## Usage

Run `php artisan vendor:publish` to publish the default config file, edit caching setting withing the resulting `config/fanout.php` file as desired.


### Example controller method, and it's related view:

```php
$fanout = Fanout::start();
$fanout->trigger( 'want-to-brodcast-channel-name', [
    'data1' => 'lorem ipsum dolor',
    // ...
] );
```

DONT FORGET change YOUR-REALM-ID and YOUR-CHANNEL

View:
```php
@extends('layouts.default')

@section('content')

    Fanout.io Web Socket

@endsection

@section('footer')
    <script src="http://YOUR-REALM-ID.fanoutcdn.com/bayeux/static/faye-browser-min.js"></script>
    <script type="text/javascript">
        var client = new Faye.Client('http://YOUR-REALM-ID.fanoutcdn.com/bayeux');
        client.subscribe('/YOUR-CHANNEL', function (data) {
            console.log( data );
        });
    </script>
@endsection
```
