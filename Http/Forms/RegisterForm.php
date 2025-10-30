<?php

namespace Http\Forms;

use Core\Validator;

class RegisterForm extends Form
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        Parent::__construct($this->attributes['email']);

        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters.';
        } else {
            if ($attributes['password'] !== $attributes['confirm_password']) {
                $this->errors['password'] = 'Password does not match.';
            }
        }
        if (!Validator::string($attributes['name'], 3, 45)) {
            $this->errors['name'] = 'Please provide a valid name of at max 45 characters.';
        } else {
            if (!Validator::name($attributes['name'])) {
                $this->errors['name'] = "Invalid name. Only letters, spaces, and simple symbols like ' and - are allowed.";
            }
        }
        if (empty($attributes['birthdate'])) {
            $this->errors['birthdate'] = 'Birthdate is required.';
        } else {
            if (!Validator::date($attributes['birthdate'])) {
                $this->errors['birthdate'] = 'Please provide a valid period of birthdate.';
            }
        }
        if (empty($attributes['gender'])) {
            $this->errors['gender'] = 'Gender is required.';
        }
    }
}