<?php

namespace App\Controllers;

use App\Views\TaskDetail;
use App\Views\Register;
use App\Models\User;

class RegisterController
{
    public function index() {
        $RegisterView=new Register();
        $RegisterView->render();

    }
    public function register() {
        if($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if($password !== $password_confirm) {
                $_SESSION['alert']['danger'] = "Passwords do not match";
                header("Location: /register");
                exit();
            }

            $modelUser = new User();
            $modelUser->createUser($email, $password);
            $_SESSION['alert']['success'] = "Вы прошли регистрацию успешно";
            header("Location: /");
        }
    }
}