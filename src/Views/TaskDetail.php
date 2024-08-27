<?php

namespace App\Views;

use Couchbase\View;

class TaskDetail extends Base
{
    public function container($task=null)
    {
        ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <form action="/update-task/<?php echo $task['id'] ?>" method="POST">
                        <div class="mb-3"><label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input value="<?php echo $task['name'] ?>" name="name" type="text" class="form-control"></div>
                        <div class="mb-3"><label for="exampleFormControlTextarea1"
                                                 class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3"><?php echo $task['description'] ?></textarea>
                        </div>
                        <button class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}