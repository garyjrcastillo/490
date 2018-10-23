<?php
session_start();
$_SESSION['username'] = "USER";
#if(!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] !== true)
#{
#	header("location: welcome.php");
#	exit;
#}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px arial;color: blue;  text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Welcome to our site.</h1>
    </div>
    <p>
<!--        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a> -->
        <a href="logout.php" class="btn btn-warning">Sign Out of Your Account</a>
    </p>
</body>
</html>
