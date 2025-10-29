<?php

use Core\Authenticator;
use Http\Forms\RegisterForm;

$form = RegisterForm::validate($attributes = [
    'email'=>$_POST['email'],
    'password'=>$_POST['password'],
    'confirm_password'=>$_POST['confirm_password'],
    'name'=>$_POST['name'],
    'birthdate'=>$_POST['birthdate'],
    'gender'=>$_POST['gender']
]);

$registered = (new Authenticator())->attemptRegister(
    $attributes['email'],
    $attributes['password'],
    $attributes['name'],
    $attributes['gender'],
    $attributes['birthdate']
);

if (!$registered) {
    header('location: /login');
    exit();
}

header('location: /');
exit();