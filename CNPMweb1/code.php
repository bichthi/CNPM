<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail_verify ($name, $email,$verify_token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host ="smtp.gmail.com";
    $mail->Username = "quynhngaphan712@gmail.com";
    $mail->Password = "catf jfua ergi xcjl";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("quynhngaphan712@gmail.com", $name);
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Email Verification from GroupF4";

    $email_template = "
        <h2>You have Registered with GroupF4</h2>
        <h5>Verify your email address to Login with the below given link</h5>
        <br/><br/>
        <a href='http://localhost/CNPMweb1/verify-email.php?token=$verify_token'>Click me</a>

    ";

    $mail->Body = $email_template;
    $mail->send();
}
if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());

     if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*]/', $password)) {
        $_SESSION['status'] = "Mật khẩu không hợp lệ!";
        header("Location: register.php");
        exit(0);
    }

    

    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
         $_SESSION['status'] = "Email Id alreadly Exits";
         header("Location: register.php");
    }
    else
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $query = "INSERT INTO users (name,phone,email,password,verify_token, role) VALUES ('$name','$phone','$email','$hashed_password','$verify_token','$role')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            sendemail_verify("$name", "$email","$verify_token");
            $_SESSION['status']="Registration Succesfull.! Please verify your Email Address.";
            header("Location: register.php");

        }
        else
        {
            $_SESSION['status']="Registration Failed";
            header("Location: register.php");

        }
    }
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check_email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $user = mysqli_fetch_array($check_email_query_run);
        $stored_password = $user['password'];

        if (password_verify($password, $stored_password)) {
            $_SESSION['authenticated'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
        
        } else {
            $_SESSION['status'] = "Invalid password!";
            header("Location: login.php");
        }
    } else {
        $_SESSION['status'] = "Email does not exist!";
        header("Location: login.php");
    }
}

if (isset($_POST['update_to_seller'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $query = "UPDATE users SET role = 1 WHERE id = '$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "User role updated to Seller successfully";
        header("Location: admin-dashboard.php");
        exit(0);
    } else {
        $_SESSION['status'] = "Failed to update role to Seller";
        header("Location: admin-dashboard.php");
        exit(0);
    }
}

if (isset($_POST['update_to_user'])) {
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $query = "UPDATE users SET role = 0 WHERE id = '$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['status'] = "User role updated to User successfully";
        header("Location: admin-dashboard.php");
        exit(0);
    } else {
        $_SESSION['status'] = "Failed to update role to User";
        header("Location: admin-dashboard.php");
        exit(0);
    }
}
?>