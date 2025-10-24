<?php

use Core\Database;
use Core\Validator;
use Core\App;

$errors = [];


$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
if (!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password,7,255)){
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!empty($errors)){
    return view("registration/create.view.php",[
        'heading'=>'Register',
        'errors'=>$errors
    ]);
}


// check if the account already exists
$db = App::resolve(Database::class);
$user = $db->query('select * from users where email=:email',[':email'=>$email])->find();

if ($user){        
    // if yes, redirect to a login page
    header('location: /login');
    exit();
} else{
    // if not, save one to the database, and then log the user in, and redirect
    $db->query('insert into users (name,email,password) values(:name,:email,:password)',[
        ':name'=>'guest',
        ':email'=>$email,
        ':password'=>password_hash($password,PASSWORD_BCRYPT)
    ]);

    $user = $db->query('select * from users where email=:email',[':email'=>$email])->find(); //

    // mark that the user logged in
    $_SESSION['user'] = [
        'email' => $email,
        'user_id' => $user['id']    //
    ];

    header('location: /');
    exit();
}
