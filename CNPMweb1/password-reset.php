<?php
session_start();

$page_title = "Password Reset Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <?php
                if(isset($_SESSION['status']))
                {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>

                <div class="card ">
                    <div class="card-header">
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">

                         <form action="password-reset-code.php" method = "POST">
                           
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name = "password_reset_link"class="btn btn-primary">Send Password Reset Link</button>
                            </div>
                            
                         </form>

                         <hr>
                         <h5> 
                            Did not receive your Verification Email?
                            <a href="resend-email-verification.php">Resend</a>
                         </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


