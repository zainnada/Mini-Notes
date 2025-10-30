<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];
// find the corresponding note
$note = $db->query('select * from notes where id = ?', [$_POST['id']])->findOrFail();


// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$currentUserId = 3;

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!Validator::string($_POST['title'], 1, 200)) {
    $errors['body'] = 'A title of no more than 200 characters is required.';
}


// if no validation errors, update the record in the notes database table.
if (count($errors))
    return view("notes/edit.view.php", [
        'heading' => "Edit Note",
        'errors' => $errors,
        'note' => $note
    ]);

$db->query('update notes set title=:title, body=:body where id=:id', [
    ':title' => $_POST['title'],
    ':body' => $_POST['body'],
    ':id' => $_POST['id']
]);

// redirect the user
header('location: /notes');
die();