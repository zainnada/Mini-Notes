<?php

namespace Http\Forms;

use Core\Validator;

class ContactForm extends Form
{
    public function __construct(public array $attributes)
    {
        Parent::__construct($attributes['email']);
        $domain = substr(strrchr($attributes['email'], "@"), 1); // Extract domain from email
        if (!checkdnsrr($domain,'MX')){
            $this->errors['email'] = 'Domain does not have MX records, may not be able to receive email.';
        }

        if (!Validator::string($attributes['name'], 3, 45)) {
            $this->errors['name'] = 'Please provide a valid name of at max 45 characters.';
        } else {
            if (!Validator::name($attributes['name'])) {
                $this->errors['name'] = "Invalid name. Only letters, spaces, and simple symbols like ' and - are allowed.";
            }
        }
        if (!Validator::string($attributes['message'], 2, 1000)) {
            $this->errors['message'] = 'A message of no more than 1,000 characters is required.';
        }
    }
}