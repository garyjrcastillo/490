<?php
session_start();

//include("testRabbitMQClient.php");

unset ($_SESSION["index"]);


$_SESSION["register"] =  'true';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<title> Registration Page</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  	
    <style type="text/css">
      body{
          background-image: url(background.jpg);
          background-size: cover;
          background-position: center center;
          background-attachment: fixed;

      }
        #ui{
          background-color: #4285F4;
          padding: 50px;
          margin-top: 50px;
          border-radius: 20px;
        }

        #ui label, h1{
          color:#fff;

        }
    </style>
    </head>

  	<body>
      <div class="container">
        <div class="row">
          

            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div id="ui">

                    <h1 class="text-center">REGISTRATION FORM</h1>
                    <form class="form-group text-center" action = "testRabbitMQClient.php" method = "post">
                        <div class="row">
			  <div class="col-lg-6">


			  
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username">

                          </div>

                          

                        </div>

                        
                        <div class="row">
                          <div class="col-lg-6">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">

                          </div>

                          <div class="col-lg-6">
                            <label>Re-Type Password:</label>
                            <input type="password" name="password2" class="form-control" placeholder="Re-Type Password">

                          </div>

                        </div>

                          <br>
                          <input type="submit" name="submit" value="Submit" class="btn btn-success btn-block btn-lg">
                    </form>
                </div>
            </div>
            <div class="col-lg-3"></div>
              

        </div>
          
      </div>
  		



  	</body>
</html>
