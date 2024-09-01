<?php

namespace App\Views;

class Login extends Base
{
    public function container()
    {
        ?>
        <div class="container">
            <div class="row justify-content-center mt-4">
                <div class="col-4"><h3 class="mb-4 text-center">Hello, mate!</h3>
                    <form action="/login" method="POST">
                        <div class="form-group mt-2"><label>Email</label> <input name="email" type="email" class="form-control" placeholder="Enter email"></div>
                        <div class="form-group mt-2"><label>Password</label> <input name="password" type="password" class="form-control" placeholder="Enter password"></div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4 mt-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="form2Example34"
                                           checked/>
                                    <label class="form-check-label" for="form2Example34"> Remember me </label>
                                </div>
                            </div>
                            <div class="col">
                                <!-- Simple link -->
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>

                        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="/register">Register</a></p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}