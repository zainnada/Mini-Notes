<?php

use Core\Database;
use Core\Session;
use Core\Validator;
use Core\App;

$errors = [];


$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];

// validate the form inputs
if (!Validator::email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password,7,255)){
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if (!Validator::string($name,3,45)){
    $errors['name'] = 'Please provide a valid name of at max 45 characters.';
}

if (empty($birthdate)) {
    $errors['birthdate'] = 'Birthdate is required.';
} else {
    if (!Validator::date($birthdate)){
        $errors['birthdate'] = 'Please provide a valid period of birthdate.';
    }
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
    // if yes, redirect to a login page, and flash the email
    Session::flash('old', ['email'=>$email]);
    header('location: /login');
    exit();
} else{
    // if not, save one to the database, and then log the user in, and redirect
    $db->query('insert into users (name,email,gender,birthdate,password) values(:name,:email,:gender,:birthdate,:password)',[
        ':name'=>$name,
        ':email'=>$email,
        ':gender'=>$gender,
        ':birthdate'=>$birthdate,
        ':password'=>password_hash($password,PASSWORD_BCRYPT)
    ]);

    $user = $db->query('select * from users where email=:email',[':email'=>$email])->find(); //

    // mark that the user logged in
    $_SESSION['user'] = [
        'user_id' => $user['id'],
        'name' => $user['name'],
        'email' => $email,
        'birthdate' => $user['birthdate']
    ];

    header('location: /');
    exit();
}
