<?php
namespace App\Controllers;
use App\Views\Home;
use App\Models\Task;
class HomeController
{
    public function index()
    {
        $task = new Task();
        $tasks  = $task->getTasks();
        $view = new Home();
        $view->render($tasks);
    }
}