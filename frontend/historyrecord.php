<?php
session_start();


unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)
unset( $_SESSION["api"] ); #-----

$_SESSION["validate"] = 'true'; //so rabbitMQClient will check to see if they are validated
include ("testRabbitMQClient.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fantastic 4 Food</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="img/logo2.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                        <a class="nav-link" href="mainpage.php">Home</a>
		</li>



                <li class="nav-item active">
                        <a class="nav-link" href="likes.php">Likes Record</a>
                </li>

                        <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                </ul>
        </div>
</div>
</nav>
<?php
#session_start();	
include ("config.php");

	echo "Hello " . $_SESSION["un"] . "!";
	$un = $_SESSION["un"];	
	#HERE IS THE LIST OF FOOD WE HAVE SUGGESTED YOU:
                #
                echo "<br>";
                $query2 = "SELECT * FROM historyFood where username = '$un' ORDER BY created_at DESC";
		#echo $query2;
                ($t = mysqli_query($db,$query2) ) or die(mysqli_error($db) );

                echo "<br><br>";
                echo "<table border =2 width = 50%>";
                echo "<tr>";
                echo "<td>username</td>";
                echo "<td>food Name</td>";
                echo "<td>Date</td>";
                while($r = mysqli_fetch_array ($t, MYSQLI_ASSOC) )
                {
                        $uname = $r["username"];
                        $fname = $r["foodName"];
                        $date = $r["created_at"];
                        echo "<tr>";
                        echo "<td>$uname</td>";
                        echo "<td>$fname</td>";
                        echo "<td>$date</td>";


                };
                echo "</table>";
                echo "<br><br>";

                #



?>
</body>
</html>
