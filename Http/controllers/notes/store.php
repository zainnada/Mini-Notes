<?php

use Core\Database;
use Core\Validator;

use Core\App;


$db = App::resolve(Database::class);


$currentUserId = $_SESSION['user']['user_id'];


$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (! Validator::string($_POST['title'], 1, 200)) {
    $errors['body'] = 'A title of no more than 200 characters is required.';
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => "Create Note",
        'errors' => $errors
    ]);
}

$db->query(
    'insert into notes (title, body, user_id) values (:title, :body, :user_id)',
    [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':user_id' => $currentUserId
    ]
);

header('location: /notes');
die();
