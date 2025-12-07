<?php

use Core\App;
use Core\Database;

$id = $_GET['id'];

$db = App::resolve(Database::class);
$message = $db->query('select * from contacts where id = ?', [$id])->findOrFail();

view("Admin/show-message.view.php", [
    'heading' => 'show message',
    'message' => $message
]);

