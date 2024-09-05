<?php

namespace App\Views;

abstract class Base
{
    public function render($task=null, $tasks=null)
    {
        ?>
        <!doctype html>
        <html lang="en">
          <head>
              <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Bootstrap demo</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          </head>
          <body>
              <?php if (isset($_SESSION['user'])):?>
                  <div class="d-flex justify-content-end">
                      <form action="/logout" method="post">
                      <button  type="submit" class="btn btn-secondary">Logout</button>
                      </form>
                  </div>
              <?php endif;?>

              <?php if(isset($_SESSION['alert']) && isset($_SESSION['alert']['danger'])):?>
          <div class="row justify-content-center mt-4">
          <div class="alert alert-danger col-6 text-center" role="alert">
              <?php echo $_SESSION['alert']['danger']; unset($_SESSION['alert']);?>
          </div>
          </div>
           <?php endif;?>
          <?php if(isset($_SESSION['alert']) && isset($_SESSION['alert']['success'])):?>
              <div class="row justify-content-center mt-4">
                  <div class="alert alert-success col-6 text-center" role="alert">
                      <?php echo $_SESSION['alert']['success']; unset($_SESSION['alert']);?>
                  </div>
              </div>
          <?php endif;?>
          <?php  $this->container($task, $tasks); ?>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
          </body>
    </html>
        <?php
    }

    abstract public function container();

}