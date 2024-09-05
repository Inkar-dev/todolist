<?php

namespace App\Controllers;

use App\Models\Task;
use App\Views\TaskDetail;

class TaskController extends BaseController
{
    private $taskModel;
    public function __construct()
    {
        parent::checkAuth();
        $this->taskModel = new Task();
    }
    public function createTask()
    {
        if ($_POST) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $user_id = $_SESSION['user_id'];

            $this->taskModel->createTasks($name, $description, $user_id);

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