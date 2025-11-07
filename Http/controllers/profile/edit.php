<?php

use Core\Session;

$currentUser = $_SESSION['user'];

view("profile/edit.view.php", [
    'heading' => "Edit Profile",
    'user' => $currentUser,
    'errors' => Session::get('errors')
]);
