<?php
namespace App\Controllers;
use App\Views\Home;

class HomeController
{
    public function index()
    {
        $view = new Home();
        return $view->index();
    }

}