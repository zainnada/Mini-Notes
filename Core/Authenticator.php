<?php

namespace Core;

class Authenticator
{
    public function attemptLogin($email, $password): bool
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
        return false;
    }

    public function login($user): void
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

    public function attemptRegister($email, $password, $name, $gender, $birthdate): bool
    {
        // check if the account already exists
        $db = App::resolve(Database::class);
        $user = $db->query('select * from users where email=:email', [':email' => $email])->find();

        if (!$user) {
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
        // if yes, flash the email, and redirect to a login page in the controller
        Session::flash('old', ['email' => $email]);
        Session::flash('emailExists', 'This email is already registered.');
        return false;
    }

    public function attemptEditProfile($user_id, $attributes): bool
    {
        if (!self::isEmailAvailable($attributes['email'], $user_id)) {
            Session::flash('errors', ['email' => 'Email is already registered']);
            Session::flash('old', $attributes);
            return false;
        }

        $db = App::resolve(Database::class);

        $db->query('UPDATE users
        SET name = :name,
            email = :email,
            gender = :gender,
            birthdate = :birthdate
        WHERE id = :user_id', [
            ':name' => $attributes['name'],
            ':email' => $attributes['email'],
            ':gender' => $attributes['gender'],
            ':birthdate' => $attributes['birthdate'],
            ':user_id' => $user_id
        ]);

        $user = $db->query('select * from users where email=:email', [':email' => $attributes['email']])->find();
//            Session::flash('test', var_dump($user));

        $this->login($user);
        return true;
    }

    public static function isEmailAvailable($email, $user_id): bool
    {
        $db = App::resolve(Database::class);

        $user = $db->query(
            'SELECT * FROM users WHERE email = :email',
            [':email' => $email]
        )->find();

//        Session::flash('test',$user);
//        Session::flash('test2',"{$user['id']}"."-$user_id");

        if (!$user) {
            return true;
        }

        if ($user['id'] == $user_id) {
            return true;
        }

        return false;
    }


    public function logout(): void
    {
        Session::destroy();
    }

    public static function attemptSendMessage($attributes): bool
    {
        // don't allow to send two messages in the same day
        $db = App::resolve(Database::class);

        // I am using the database for contact purpose, in the future I will use the email
        $contact = $db->query(
            'SELECT * FROM contacts WHERE email = :email and DATE(created_at)=CURDATE()',
            [':email' => $attributes['email']]
        )->find();

        if (!$contact){
            $db->query('insert into contacts (name,email,message) values(:name,:email,:message)', [
                ':name' => $attributes['name'],
                ':email' => $attributes['email'],
                ':message' => $attributes['message']
            ]);
            return true;
        }
        return false;
    }

}