# Century package for laravel

> Install this package at your own risk. Laravel and Vue.js Fullcalendar

## Installation

```bash
composer require taggers/calendar
```

The service provider will register automatically. Or you may manually add the service provider in your `config/app.php` file:

```php
'providers' => [
    // ...
    Taggers\Century\CenturyServiceProvider::class
]
```

Run this command to publish resources
```bash
php artisan vendor:publish --provider="Taggers\Century\CenturyServiceProvider"
```

## Usage

The head section must have

```html
<meta name="csrf-token" content="{{ csrf_token() }}">
```
and

```html
<script src="{{ asset('vendor/century/century.js') }}"></script>
```

and the `century` component must be inside a div with an id `app`

```html
<div id="app">
    <century></century>
</div>
```
