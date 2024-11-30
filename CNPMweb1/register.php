<?php
session_start();
$page_title = "Registration Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" onsubmit="return validatePassword();">
                            <div class="form-group mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                <small class="text-muted">
                                    Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt (!@#$%^&*).
                                </small>
                                <div id="error" class="text-danger mt-2"></div>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validatePassword() {
    const password = document.getElementById("password").value;
    const error = document.getElementById("error");

    // Tiêu chí kiểm tra mật khẩu
    const minLength = 8; // Độ dài tối thiểu
    const specialCharRegex = /[!@#$%^&*]/; // Ký tự đặc biệt
    const upperCaseRegex = /[A-Z]/; // Chữ hoa
    const lowerCaseRegex = /[a-z]/; // Chữ thường
    const numberRegex = /[0-9]/; // Chữ số

    // Kiểm tra các tiêu chí
    if (password.length < minLength) {
        error.innerText = "Mật khẩu phải có ít nhất 8 ký tự.";
        return false;
    }
    if (!specialCharRegex.test(password)) {
        error.innerText = "Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt (!@#$%^&*).";
        return false;
    }
    if (!upperCaseRegex.test(password)) {
        error.innerText = "Mật khẩu phải có ít nhất 1 chữ cái viết hoa.";
        return false;
    }
    if (!lowerCaseRegex.test(password)) {
        error.innerText = "Mật khẩu phải có ít nhất 1 chữ cái viết thường.";
        return false;
    }
    if (!numberRegex.test(password)) {
        error.innerText = "Mật khẩu phải chứa ít nhất 1 số.";
        return false;
    }

    error.innerText = "";
    return true;
}
</script>

