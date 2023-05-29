<?php require_once("helpers/functions.php"); ?>
<?php require_once("helpers/db_connect.php"); ?>
<?php site_header(); ?>

<div class="container">
    <div class="row mt-5 mb-4 ">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-center">
            <form method="POST" action="controllers/login.php">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Login Here!</h4>
                    <p>Please enter your credentials</p>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="useremail" id="useremail" placeholder="name@example.com">
                    <label for="useremail">Email Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <input type="submit" name="loginbtn" class="btn btn-primary" value="Login">
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>
<?php site_footer(); ?>