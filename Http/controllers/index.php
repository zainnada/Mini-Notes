<?php

$_SESSION['first_name'] = 'Zain';

$heading = "Home";

view("index.view.php",[
    'heading'=>$heading,
]);
