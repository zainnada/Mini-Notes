<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterForm // we can implement inheritance in this case, by creating a parent class called form
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least 7 characters.';
        } else {
            if ($attributes['password'] !== $attributes['confirm_password']) {
                $this->errors['password'] = 'Password does not match.';
            }
        }

        if (!Validator::string($attributes['name'], 3, 45)) {
            $this->errors['name'] = 'Please provide a valid name of at max 45 characters.';
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

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }


}