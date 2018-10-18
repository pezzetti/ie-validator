# Inscrição Estadual
[![Build Status](https://travis-ci.org/pezzetti/IEValidator.svg?branch=master)](https://travis-ci.org/pezzetti/IEValidator)
[![codecov](https://codecov.io/gh/pezzetti/IEValidator/branch/master/graph/badge.svg)](https://codecov.io/gh/pezzetti/IEValidator)

PHP library for validating and printing IE for brazilian states 

## Requirements

* PHP 5.4.16+

## Instalation

Usando [Composer](http://getcomposer.org):

```ssh
composer require pezzetti/inscricaoestadual
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
