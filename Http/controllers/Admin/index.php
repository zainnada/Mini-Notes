<?php

use Core\App;
use Core\Database;

$user = $_SESSION['user'] ?? '';

if ($_SESSION['user'] ?? false) {
    if ($_SESSION['user']['email']=='admin@mininotes.com') {
        $db = App::resolve(Database::class);
        $messages = $db->query('select * from contacts order by id DESC')->get();
        view("Admin/index.view.php", [
            'heading' => "Admin Dashboard",
            'user' => $user,
            'messages' => $messages
        ]);
    }
} else {
    abort(403);
    exit();
}
