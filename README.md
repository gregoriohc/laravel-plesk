# Laravel 5 Plesk RPC API wrapper

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gregoriohc/laravel-plesk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gregoriohc/laravel-plesk/?branch=master)

A simple Laravel 5 package that wraps [Plesk](https://plesk.com) RPC API.

## Requirements

* PHP 5.4 or greater

## Installation

You can install the package using the [Composer](https://getcomposer.org/) package manager running this command in your project root:

```sh
composer require gregoriohc/laravel-plesk
```

## Laravel

The package includes a service providers and a facade for easy integration and a nice syntax for Laravel.

Firstly, add the `Gregoriohc\LaravelPlesk\PleskServiceProvider` provider to the providers array in `config/app.php`

```php
'providers' => [
  ...
  Gregoriohc\LaravelPlesk\PleskServiceProvider::class,
],
```

and then add the facade to your `aliases` array

```php
'aliases' => [
  ...
  'Plesk' => Gregoriohc\LaravelPlesk\Facades\Wrapper::class,
],
```

### Configuration

Publish the configuration file with:

```sh
php artisan vendor:publish --provider="Gregoriohc\LaravelPlesk\PleskServiceProvider"
```

Head into the file and configure the keys and defaults you'd like the package to use.

## Usage

#### Creating an user

```php
Plesk::customer()->create([
    'pname' => 'John Smith',
    'login' => 'john-unit-test',
    'passwd' => 'simple-password',
]);
```

#### More examples

For more examples of usage, please see the original PHP Plesk RPC API package tests: https://github.com/plesk/api-php-lib/tree/master/tests

## Contributing

If you're having problems, spot a bug, or have a feature suggestion, please log and issue on Github. If you'd like to have a crack yourself, fork the package and make a pull request.
