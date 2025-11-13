<?php

use Core\Session;

$heading = "Contact Us";

view("contact.view.php", [
    'heading' => $heading,
    'errors' => Session::get('errors')
]);
