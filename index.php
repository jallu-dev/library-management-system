<?php
session_start();
error_reporting(0);
include('includes/config.php');
if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}

if (isset($_POST['login'])) {
    if ($_POST["vercode"] != $_SESSION["vercode"] or $_SESSION["vercode"] == '') {
        echo "<script>alert('Incorrect verification code');</script>";
    } else {
        $email = $_POST['emailid'];
        $password = md5($_POST['password']);
        $sql = "SELECT EmailId,Password,StudentId,Status FROM tblstudents WHERE EmailId={$email} and Password={$password}";

        $results = $conn->query($sql);

        if ($results->num_rows > 0) {
            foreach ($results as $result) {
                $_SESSION['stdid'] = $result->StudentId;
                if ($result->Status == 1) {
                    $_SESSION['login'] = $_POST['emailid'];
                    Header("Location:dashboard.php");
                } else {
                    echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";
                }
            }
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <title>Online Library Management System | </title>
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>

    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <h4 class="header-line">USER LOGIN FORM</h4>

        <div class="form-body">
            <form role="form" method="post">

                <div class="form-group">
                    <label>Enter Email id</label>
                    <input class="form-control" type="text" name="emailid" required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required autocomplete="off" />
                    <p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
                </div>
                <button type="submit" name="login" class="btn btn-info">LOGIN </button> | <a href="signup.php">Not
                    Register Yet</a>
            </form>
        </div>
    </div>

</body>

</html>