<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    
    $mail->Host ="smtp.gmail.com";
    $mail->Username = "quynhngaphan712@gmail.com";
    $mail->Password = "catf jfua ergi xcjl";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("quynhngaphan712@gmail.com", $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
        <h2>Hello</h2>
        <h3>You are receiving this email because we received a password reset request for your account.</h3>
        <br/><br/>
        <a href='http://127.0.0.1/CNPMweb1/password-change.php?token=$token&email=$get_email'> Click me </a>
    ";

    $mail->Body = $email_template;
    $mail->send();
}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']); 
    $token = md5(rand());

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
       $row = mysqli_fetch_array($check_email_run);
       $get_name = $row['name'];
       $get_email = $row['email'];

       $update_token = "UPDATE users SET verify_token ='$token' WHERE email= '$get_email'LIMIT 1 ";
       $update_token_run = mysqli_query($con, $update_token);
       
       if($update_token_run)
       {
           send_password_reset($get_name,$get_email,$token);
           $_SESSION['status'] = "We e-mailed you a password reset link";
           header("Location: password-reset.php");
           exit(0);
       }
       else
       {
        $_SESSION['status'] = "Something went wrong. #1";
        header("Location: password-reset.php");
        exit(0);
       }
    }
    else
    {
  $_SESSION['status']="No Email Found";
  header("Location: password-reset.php");
  exit(0);
    }
}


if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $new_password = mysqli_real_escape_string($con,$_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con,$_POST['confirm_password']);
    $token = mysqli_real_escape_string($con,$_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            $check_token = "SELECT verify_token FROM users WHERE verify_token='$token'LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            if(mysqli_num_rows($check_token_run)>0)
            {
               if($new_password == $confirm_password)
               {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $update_password = "UPDATE users SET password='$hashed_password' WHERE verify_token = '$token' LIMIT 1";                
                 $update_password_run = mysqli_query($con,$update_password);

                  if($update_password_run)
                  {
                    $new_token = md5(rand())."funda";
                    $update_to_new_token ="UPDATE users SET verify_token='$new_token'WHERE verify_token = '$token' LIMIT 1";
                    $update_to_new_token_run = mysqli_query($con, $update_to_new_token);

                    
                    $_SESSION['status']=" New Password Successsfully Updated.! ";
                    header("Location: login.php");
                    exit(0);  
                  }
                  else
                  {
                    $_SESSION['status']=" Did not update password. Something went wrong,! ";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);  
                  }
                }
                else
                {
                $_SESSION['status']="Password and Confirm Password does not match";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);  
                }
            }
            else
            {
                $_SESSION['status']="Invalid Token";
                header("Location: password-change.php?token=$token&email=$email");
                exit(0);  
            }
        }
        else
        {
            $_SESSION['status']="All Filed are Mandetory";
            header("Location: password-change.php?token=$token&email=$email");
            exit(0);  
        }
    }
    else
    {
        $_SESSION['status']="No Token Available";
        header("Location: password-change.php");
        exit(0);
    }
}

?>
