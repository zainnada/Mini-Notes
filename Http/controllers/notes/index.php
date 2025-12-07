<?php

use Core\Database;
use Core\App;

$heading = "Notes";

if ($_SESSION['user'] ?? false) {
    $db = App::resolve(Database::class);
    $currentUserId = $_SESSION['user']['user_id'];
    $notes = $db->query('select * from notes where user_id = ? order by id DESC', [$currentUserId])->get();
    view("notes/index.view.php", [
        'heading' => $heading,
        'notes' => $notes
    ]);
} else {
    abort(403);
    exit();
}
