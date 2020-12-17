# Inscrição Estadual
[![Build Status](https://travis-ci.org/pezzetti/ie-validator.svg?branch=master)](https://travis-ci.org/pezzetti/ie-validator)
[![codecov](https://codecov.io/gh/pezzetti/ie-validator/branch/master/graph/badge.svg)](https://codecov.io/gh/pezzetti/ie-validator)
[![Total Downloads](https://img.shields.io/packagist/dt/pezzetti/ie-validator.svg?style=flat-square)](https://packagist.org/packages/pezzetti/ie-validator)

PHP library for validating and printing Inscrição Estadual (IE) for brazilian states 

## Requirements

* v1.1.0 -> PHP >= 5.6
* v2.0.0 -> PHP >= 7.1

## Instalation

With [Composer](http://getcomposer.org):

PHP 7
```ssh
composer require pezzetti/ie-validator
```
PHP 5.6
```ssh
composer require pezzetti/ie-validator:1.1
```
## Usage
```php
require_once __DIR__ . '/vendor/autoload.php';

use Pezzetti\InscricaoEstadual\Util\Validator;
use Pezzetti\InscricaoEstadual\Util\Mask;
use Pezzetti\InscricaoEstadual\Util\States;

Validator::check(States::SP,'231.247.190.013');

Mask::getIEForUF(States::SP,'241205090864');
``` 
