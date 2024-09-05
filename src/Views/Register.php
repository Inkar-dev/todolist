<?php

namespace App\Views;

class Register extends Base
{
    public function container()
    {
        ?>
        <div class="=container">
            <div class="row justify-content-center mt-4">
                <div class="col-4"><h3 class="mb-4 text-center">Register</h3>
                    <form action="/register" method="post">
                        <div class="form-group mt-2"><label>Email</label> <input name="email" type="email" class="form-control" placeholder="Enter email"></div>
                        <div class="form-group mt-2"><label>Password</label> <input name="password" type="password" class="form-control" placeholder="Enter password"></div>
                        <div class="form-group mt-2 mb-2"><label>Password confirm</label> <input name="password_confirm" type="password" class="form-control" placeholder="Enter password confirm">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
       <?php
    }


}