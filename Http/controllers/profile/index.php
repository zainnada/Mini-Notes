<?php

$user = $_SESSION['user'];

view("profile/index.view.php", [
    'heading' => "My Profile",
    'user' => $user,
]);
