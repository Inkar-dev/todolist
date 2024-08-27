<?php

namespace App\Controllers;

use App\Models\Task;
use App\Views\TaskDetail;

class TaskController
{
    private $taskModel;
    public function __construct(){
        $this->taskModel = new Task();
    }
    public function createTask()
    {
        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            $this->taskModel->createTasks($name, $description);

            header('Location: ' . $_SERVER["HTTP_REFERER"]);
        }

    }

    public function deleteTask($id)
    {
            $this->taskModel->deleteTask($id);

            header('Location: ' . $_SERVER["HTTP_REFERER"]);
    }

    public function editTask($id) {
        $task = $this->taskModel->getTask($id);
        $taskDetailView=new TaskDetail();
        $taskDetailView->render($task);

    }

    public function updateTask($id) {
        if ($_POST) {

            $name = $_POST['name'];
            $description = $_POST['description'];

        $this->taskModel->updateTask($id, $name, $description  );

        }
        header('Location: /' );


    }

}