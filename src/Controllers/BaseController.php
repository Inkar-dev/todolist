<?php

namespace App\Controllers;

use App\Middlewares\CheckAuth;

class BaseController
{
    public function checkAuth()
    {
        CheckAuth::checkUserAuth();
    }

    public function notCheckUserAuth()
    {
        CheckAuth::notCheckUserAuth();
    }
}