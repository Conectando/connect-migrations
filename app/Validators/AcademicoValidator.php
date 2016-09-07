<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AcademicoValidator extends LaravelValidator
{

    const RFC_REGEX = '/^[A-Z]{4}([0-9]{2})(1[0-2]|0[1-9])([0-3][0-9])([ -]?)([A-Z0-9]{4})$/';
    const INTERNATIONAL_NUMBERS_REGEX = '/^\+[1-9]{1}[0-9]{3,13}$/';

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'rfc' => ['required', 'regex:' . self::RFC_REGEX, 'unique:academicos'],
        	'nombre' => 'required|between:3,50',
        	'apaterno' => 'required|between:3,25',
        	'amaterno' => 'required|between:3,25',
        	'correo' => 'required|email|unique:academicos',
        	'telefono' => ['required', 'regex:' . self::INTERNATIONAL_NUMBERS_REGEX],
        	'celular' => ['required', 'regex:' . self::INTERNATIONAL_NUMBERS_REGEX],
        ],
        ValidatorInterface::RULE_UPDATE => [
        	'rfc' => ['regex:' . self::RFC_REGEX, 'unique:academicos'],
            'nombre' => 'between:3,50',
            'apaterno' => 'between:3,25',
            'amaterno' => 'between:3,25',
            'correo' => 'email|unique:academicos',
            'telefono' => ['regex:' . self::INTERNATIONAL_NUMBERS_REGEX],
            'celular' => ['regex:' . self::INTERNATIONAL_NUMBERS_REGEX],
        ],
   ];
}
