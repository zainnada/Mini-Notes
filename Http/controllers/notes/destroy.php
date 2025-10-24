<?php

use Core\Database;
use Core\App;

// $config = require base_path('config.php');
// $db = new Database($config['Database']);
$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];


$note = $db->query('select * from notes where id = :id',[
    'id'=>$_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id',[
    'id'=>$_GET['id']
]);

header('location: /notes');
exit();
