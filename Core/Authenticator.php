<?php

namespace Core;

class Authenticator
{
    public function attemptLogin($email, $password)
    {
        $db = App::resolve(Database::class);
        $user = $db->query('select * from users where email=:email', [':email' => $email])->find();
        if ($user) {
            // check if the password is correct
            if (password_verify($password, $user['password'])) {
                // login the user
                $this->login($user);
                header('location: /');
                return true;
            }
        }
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'user_id' => $user['id'],
            'name' => $user['name'],
            'gender' => $user['gender'],
            'birthdate' => $user['birthdate']
        ];

        session_regenerate_id(true);
    }

    public function attemptRegister($email, $password, $name, $gender, $birthdate)
    {
        // check if the account already exists
        $db = App::resolve(Database::class);
        $user = $db->query('select * from users where email=:email', [':email' => $email])->find();

        if ($user) {
            // if yes, flash the email, and redirect to a login page in the controller
            Session::flash('old', ['email' => $email]);
            return false;
        } else {
            // if not, save one to the database, and then log the user in, and redirect in the controller
            $db->query('insert into users (name,email,gender,birthdate,password) values(:name,:email,:gender,:birthdate,:password)', [
                ':name' => $name,
                ':email' => $email,
                ':gender' => $gender,
                ':birthdate' => $birthdate,
                ':password' => password_hash($password, PASSWORD_BCRYPT)
            ]);

            $user = $db->query('select * from users where email=:email', [':email' => $email])->find(); //

            // mark that the user logged in
            $this->login($user);
            return true;
        }
    }

    public function logout()
    {
        Session::destroy();
    }

}