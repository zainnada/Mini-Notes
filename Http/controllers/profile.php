<?php

$user = $_SESSION['user'];

view("profile.view.php", [
    'heading' => "My Profile",
    'user' => $user,
]);
