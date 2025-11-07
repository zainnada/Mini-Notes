<?php

use Core\Authenticator;
use Http\Forms\RegisterForm;

$editForm = RegisterForm::validate($attributes = [
    'email' => $_POST['email'],
    'name' => $_POST['name'],
    'birthdate' => $_POST['birthdate'],
    'gender' => $_POST['gender']
]);

$isEdit = (new Authenticator())->attemptEditProfile(
    $_SESSION['user']['user_id'],
    $attributes = [
        'email' => $_POST['email'],
        'name' => $_POST['name'],
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender']
    ]
);

if (!$isEdit){
    header('location: /profile/edit');
    exit();
}


header('location: /profile');
exit();
