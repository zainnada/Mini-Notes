<?php

use Core\Database;
use Core\App;
use Core\Session;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];


$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $_GET['id']
]);

Session::flash('note', 'destroy');

header('location: /notes');
exit();
