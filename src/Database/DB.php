<?php //подкл к базе по пдо

namespace App\Database;

use PDO;
use PDOException;

class DB
{
    private $servername = "MySQL-8.2";
    private $user = 'root';
    private $pass = '';
    private $name = 'todolist';


    public function connection()
    {

        $dbh = "mysql:host=$this->servername;dbname=$this->name";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            return new PDO($dbh, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}