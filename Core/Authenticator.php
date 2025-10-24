<?php

namespace Core;

use Core\Database;
use Core\App;

class Authenticator
{
    public function attempt($email,$password){
        $db = App::resolve(Database::class);
        $user = $db->query('select * from users where email=:email', [':email' => $email])->find();
        if ($user) {
            // check if the password is correct
            if (password_verify($password, $user['password'])) {
                // login the user
                $this->login($user);
                header('location: /');
                return true;
                exit();
            }
        }

    }

    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email'],
            'user_id' => $user['id']
        ];
        session_regenerate_id(true);
    }

    public function logout(){
        Session::destroy();
    }

}