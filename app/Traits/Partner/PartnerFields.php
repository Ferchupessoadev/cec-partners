<?php

namespace App\Traits\Partner;

trait PartnerFields
{
    public $name;
    public $last_name;
    public $email;
    public $dni;
    public $phone;
    public $sexo;
    public $date_of_birth;
    public $date_of_registration;
    public $address;
    public $avatar;

    public function partnerRules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required', 'string', 'min:2', 'regex:/^[\pL\s\-]+$/u'],
            'dni' => ['required', 'digits_between:7,8'],
            'email' => ['nullable', 'email'],
            'sexo' => ['required', 'string', 'in:masculino,femenino'],
            'phone' => ['nullable', 'regex:/^\+?[0-9\s\-]{7,20}$/'],
            'address' => ['nullable', 'string', 'min:5'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'date_of_registration' => ['required', 'date', 'before_or_equal:today'],
        ];
    }
}
