<?php

use Core\Database;
use Core\App;

$id = $_POST['id'];

$db = App::resolve(Database::class);
$message = $db->query('select * from contacts where id = ?', [$id])->findOrFail();

$db->query('delete from contacts where id = :id', [
    'id' => $id
]);

header('location: /admin');
exit();
