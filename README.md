# Century package for laravel

> Install this package at your own risk. This package displays 100

## Installation

```bash
composer require taggers/century
```

The service provider will automatically registered. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => [
    // ...
    Taggers\Century\CenturyServiceProvider::class
]
```

## Usage

```php
Century::display();
```