<?php
session_start();

unset( $_SESSION["register"] );

//$_SESSION = array();
//session_destroy();

//session_start();

$_SESSION["index"] = 'true';

#include("config.php");
//by default SESSION[loggedin] has no value
//$_SESSION['loggedin'] = true;
//if they are signed in. (if they dont sign out, then they will keep being signed in until browser is closed.

if(($_SESSION["sessionId"]== 'random')){
	//header("Location: welcome.php");
	header("Location: mainpage.php");
}


if(isset($_SESSION["wrong"])){
        print("WRONG USERNAME OR PASSWORD");
}


?>

<!DOCTYPE html>
<html>
<head>
        <title>Login Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="row">
                <div class="col-md-4 col-sm-4 c ol-xs-12 col-md-offset-4" style="padding-top:100px;">
		<form action ="testRabbitMQClient.php" method="post">
                                <div class="panel panel-success">
                                        <div class="panel-heading">
                                                LOGIN
                                        </div>
                                        <div class="panel-body">
                                                <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="username" class="form-control">
                                                </div>
                                                <div class ="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="password" class="form-control">
                                                </div>
                                                <div class ="form-group">

                                                        <input type="submit" name="btnSubmit" class="form-control btn btn-success">
						</div>

						<div class = "form-group">
							<a name= "regLink" href ="register.php">Register</a>
						</div>
                                        </div>
                                </div>
                        </div>
                        </form>
                </div>
        </div>



</body>
</html>
