<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (isset($_POST['signup'])) {

    $count_my_page = "studentid.txt";
    $hits = file($count_my_page);
    $hits[0]++;
    $fp = fopen($count_my_page, "w");
    fputs($fp, "$hits[0]");
    fclose($fp);
    $StudentId = "SID{$hits[0]}";
    $fname = $_POST['fullanme'];
    $mobileno = $_POST['mobileno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $status = 1;

    $sqlCheckEmail = "SELECT `EmailId` FROM `tblstudents` WHERE EmailId='{$email}'";

    if ($conn->query($sqlCheckEmail)->num_rows <= 0) {
        if ($password == $confirmpassword) {
            echo $StudentId;
            $sql = "INSERT INTO tblstudents(StudentId,FullName,MobileNumber,EmailId,Password,Status) VALUES('{$StudentId}','{$fname}','{$mobileno}','{$email}','{$password}',{$status})";
            echo $result;
            $result = $conn->query($sql);
            $lastInsertId = $conn->insert_id;
            if ($lastInsertId) {
                echo '<script>alert("Your Registration successfull and your student id is  "+"' . $StudentId . '")</script>';
                Header("Location:index.php");
            } else {
                echo "<script>alert('Something went wrong. Please try again');</script>";
            }
        } else {
            echo "<script>alert('Password and Confirm password not matched');</script>";
        }
    } else {
        echo "<script>alert('User already exists');</script>";
    }

}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Online Library Management System | Student Signup</title>

</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="container">
        <h4 class="header-line">User Signup</h4>

        <div class="form-body">
            <form name="signup" method="post" action="signup.php">
                <div class="form-group">
                    <label>Enter Full Name</label>
                    <input class="form-control" type="text" name="fullanme" autocomplete="off" required />
                </div>

                <div class="form-group">
                    <label>Mobile Number :</label>
                    <input class="form-control" type="text" name="mobileno" maxlength="10" autocomplete="off"
                        required />
                </div>

                <div class="form-group">
                    <label>Enter Email</label>
                    <input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"
                        autocomplete="off" required />
                    <span id="user-availability-status" style="font-size:12px;"></span>
                </div>

                <div class="form-group">
                    <label>Enter Password</label>
                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                </div>

                <div class="form-group">
                    <label>Confirm Password </label>
                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                </div>

                <button type="submit" name="signup" class="btn btn-danger" id="submit">Register Now
                </button>

            </form>
        </div>

    </div>

</body>

</html>