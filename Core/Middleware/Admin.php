<?php

namespace Core\Middleware;

class Admin
{
    public function handle()
    {
        if ($_SESSION['user'] ?? false) {
            if ($_SESSION['user']['email'] != 'admin@mininotes.com') {
                header('location: /');
                exit();
            }
        } else {
            header('location: /');
            exit();
        }
    }
}