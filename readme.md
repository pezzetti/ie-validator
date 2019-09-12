# Inscrição Estadual
[![Build Status](https://travis-ci.org/pezzetti/ie-validator.svg?branch=php7)](https://travis-ci.org/pezzetti/ie-validator)
[![codecov](https://codecov.io/gh/pezzetti/IEValidator/branch/php7/graph/badge.svg)](https://codecov.io/gh/pezzetti/IEValidator)
[![Total Downloads](https://img.shields.io/packagist/dt/pezzetti/ie-validator.svg?style=flat-square)](https://packagist.org/packages/pezzetti/ie-validator)

PHP library for validating and printing Inscrição Estadual (IE) for brazilian states 

## Requirements

* PHP >= 7.1

## Instalation

With [Composer](http://getcomposer.org):

```ssh
composer require pezzetti/ie-validator
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
