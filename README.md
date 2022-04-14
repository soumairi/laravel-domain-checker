# Laravel Domain Checker 
## A LARAVEL package to authorize allowed domains

[![Latest Version on Packagist](https://img.shields.io/packagist/v/soumairi/domain-checker?style=for-the-badge)](https://packagist.org/packages/soumairi/domain-checker)
[![Software License](https://img.shields.io/github/license/soumairi/laravel-domain-checker?style=for-the-badge)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/soumairi/domain-checker?style=for-the-badge)](https://packagist.org/packages/soumairi/domain-checker)
[![Build Status](https://scrutinizer-ci.com/g/soumairi/laravel-domain-checker/badges/build.png?b=main)](https://scrutinizer-ci.com/g/soumairi/laravel-domain-checker/)
[![Quality Score](https://scrutinizer-ci.com/g/soumairi/laravel-domain-checker/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/soumairi/laravel-domain-checker/)

## ABOUT

This package aims to add a security level to the application for checking the allowed domains of all the incoming HTTP requests of the application.
This package makes it easy to add a level between the incoming HTTP requests and your application by using middleware.

## Install

You can install the package via composer:
``` bash
$ composer require soumairi/domain-checker
```

Next, you must register the service provider:

```php
// config/app.php
'providers' => [
    ...
   Soumairi\DomainChecker\DomainCheckerServiceProvider::class
];
```

Next, the `\Soumairi\DomainChecker\Http\Middleware\DomainCheckerMiddleware::class`-middleware must be registered in the kernel:

```php
//app/Http/Kernel.php

protected $middleware = [
  ...
  \Soumairi\DomainChecker\Http\Middleware\DomainCheckerMiddleware::class,
];
```

You can publish the config-file with:
```bash
php artisan vendor:publish --provider="Soumairi\DomainChecker\DomainCheckerServiceProvider"
```

This is the contents of the published config file:

```php
return [
    /**
     * Allowed domains of all the incoming HTTP requests to the application to make a call to our application.
     */
    'allowed_domains' => [
        'localhost',
        '127.0.0.1',
    ],

    /**
     * Custom Error Message
     */
    'error_message' => 'This host is not allowed'
];
```