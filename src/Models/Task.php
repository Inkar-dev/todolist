<?php

namespace App\Models;
use App\Database\DB;
use PDO;

class Task
{
    private $stmt;
    public function __construct()
    {
       $db = new DB();
       $this->stmt = $db->connection();
    }

    public function getTask($id) {
        $sth = $this->stmt->prepare("Select id, name, description, created_at from tasks where id = :id");
        $sth->execute([':id' => $id]);
        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function getTasks()
    {
        $sth = $this->stmt->prepare("Select id, name, description, created_at from tasks where user_id = :user_id");
        $sth->execute([':user_id' => $_SESSION['user_id']]);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createTasks($name, $description, $user_id)
    {
        $sth = $this->stmt->prepare(
            'INSERT INTO tasks(name,description, user_id) VALUES(:name, :description, :user_id)'
        );

        $sth->execute([':name' => $name, ':description' => $description, ':user_id' => $user_id]);
    }

    public function updateTask($id, $name, $description)
    {
        $sth = $this->stmt->prepare(
            'UPDATE tasks SET name = :name,description=:description WHERE id = :id'
        );
            $sth->execute([':id' => $id, ':name' => $name, ':description' => $description]);

    }

    public function deleteTask($id)
    {
        $sth = $this->stmt->prepare(
            'DELETE FROM tasks WHERE id = :id'
        );

        $sth->execute([':id' => $id]);
    }
}