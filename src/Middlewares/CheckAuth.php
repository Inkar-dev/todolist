<?php

namespace App\Middlewares;

class CheckAuth
{
    public static function checkUserAuth()
    {
        if (!$_SESSION['user']) {
            header('location: /login');
            exit();
        }
    }

    public static function notCheckUserAuth()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']) {
            header('location: /');
        }
    }
}