# Chain an Able

[![Latest Version](https://img.shields.io/github/release/netsells/karoway.svg?style=flat-square)](https://github.com/netsells/karoway/releases)
[![Build Status](https://img.shields.io/travis/netsells/karoway.svg?style=flat-square)](https://travis-ci.org/netsells/karoway)
[![Quality Score](https://img.shields.io/scrutinizer/g/netsells/karoway.svg?style=flat-square)](https://scrutinizer-ci.com/g/netsells/karoway)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/netsells/karoway.svg?style=flat-square)](https://packagist.org/packages/netsells/karoway)

This package provides simple to use chainable HTML builder with easy integration into any platform or cms.

## Currently a Work in progress

This is currently only compatible with Laravel 5.3 and php7.



## Usage

```php+HTML
{!! $karoway->text('header.title')->wrap('h1.title') !!}
{!! $karoway->image('header.image')->alt('This is the hero image')->classes('image col-md-12') !!}
```

## Installation 

To install just require the package through composer.

`composer require netsells/karoway dev-master`

publish the config file that is required to run.

`php artisan vendor:publish --provider='Netsells\Karoway\KarowayServiceProvider'`



## Settings

These are the column names of the table that stores the attributes for the pages.

```
    'database' => [
        'key_field' => 'key',
        'value_field' => 'value',
    ],
```

These are the Model in which your Pages are stored and the relationship on that model which returns said page's attributes.

```
'models' => [
    'page' => [
        'model' => Page::class,
        'relation' => 'properties',
    ]
]
```