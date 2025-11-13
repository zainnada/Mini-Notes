<?php

use Core\Authenticator;
use Http\Forms\ContactForm;

$form = ContactForm::validate($attributes = [
    'email' => $_POST['email'],
    'name' => $_POST['name'],
    'message' => $_POST['message']
]);

$sent = (new Authenticator())->attemptSendMessage(
    $attributes = [
        'email' => $attributes['email'],
        'name' => $attributes['name'],
        'message' => $attributes['message']
    ]
);

if (!$sent) {
    $form->error(
        'limit', 'Limit Error: You can only send one message per day.'
    )->throw();
} else {
    \Core\Session::flash('success', 'Message sent!');
}

redirect('/contact');