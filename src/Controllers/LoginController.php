<?php

namespace App\Controllers;

use App\Models\User;
use App\Views\Login;

class LoginController extends BaseController
{
    public function __construct()
    {
        parent::notCheckUserAuth();
    }

    public function index() {
        $LoginView = new Login();
        $LoginView -> render();
    }
    public function login() {

        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

           if (empty($email) || empty($password)){
               $_SESSION['alert']['danger'] = "Заполните все поля";
               header("location:/login");
               exit();
           }
           $modelUser = new User();
           $user = $modelUser->loginUser($email);

           if (!$user) {
               $_SESSION['alert']['danger'] = "Вы не зарегистрированы";
               header("location:/login");
               exit();
           }

           if (!password_verify($password, $user['password'])) {
               $_SESSION['alert']['danger'] = "Неправильный пароль";
               header("location:/login");
               exit();
           }

           unset($user['password']);

           $_SESSION['user'] = $user;
           $_SESSION['user_id'] = $user['id'];
           $_SESSION['alert']['success'] = "Успешно вошли";
           header("location:/");
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

}