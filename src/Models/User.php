<?php

namespace App\Models;

use App\Database\DB;

class User
{
    public function __construct()
    {
        $db = new DB();
        $this->stmt = $db->connection();
    }
    public function createUser($email, $password)
    {
        $sth = $this->stmt->prepare(
            'INSERT INTO users(email,password) VALUES(:email, :password)'
        );

        $sth->execute([':email' => $email, ':password' => password_hash($password, PASSWORD_DEFAULT)]);
    }

}