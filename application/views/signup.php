<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Signup & Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card mt-5">

                    <div class="card-body bg-light">
                        <h2 class="card-title pt-3" style="color:tomato">Signup !!</h2>
                        <form name="signupForm" id="signupForm" method="post"
                            action="<?php echo base_url('auth/register') ;?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username">Enter Username</label>
                                    <input type="text" name="username" id="username"
                                        class="form-control <?php echo (form_error('username')!= "") ? ' is-invalid' : '' ;?>"
                                        value="<?php echo set_value('username') ;?>" placeholder="Enter Username">
                                    <?php echo form_error('username');?>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="email">Enter Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control <?php echo (form_error('email')!= "") ? ' is-invalid' : '' ;?>"
                                        value="<?php echo set_value('email') ;?>" placeholder="Enter Email">
                                    <?php echo form_error('email');?>
                                </div>
                                <div class="form-group mt-3 mb-5">
                                    <label for="password">Enter Password</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control <?php echo (form_error('password')!= "") ? ' is-invalid' : '' ;?>"
                                        value="<?php echo set_value('password') ;?>" placeholder="Enter password">
                                    <?php echo form_error('password');?>
                                </div>

                                <button type="submit"
                                    class="btn btn-secondary btn-lg btn-dark btn-block">Signup</button><br>

                                <?php if ($this->session->flashdata('msg')): ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </form>
                        
                        <form action="<?php echo base_url('auth/login') ;?>">
                        <div class="card-body">
                            <button type="submit"
                                    class="btn btn-secondary btn-lg btn-danger btn-block">Login</button><br>
                        </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>