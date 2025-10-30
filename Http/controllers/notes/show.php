<?php

use Core\Database;
use Core\App;

$heading = "Note";

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];

$id = $_GET['id'];

$note = $db->query('select * from notes where id = ?', [$id])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
    'heading' => $heading,
    'note' => $note
]);


