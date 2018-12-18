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
                        <a class="nav-link" href="historyrecord.php">History Record</a>
                </li>


                        <a class="nav-link" href="logout.php">Log out</a>
                        </li>
                </ul>
        </div>
</div>
</nav>

<?php
#session_start();
$userDown = $_SESSION["un"];

echo "Hello $userDown !";

include('config.php');

$query7 = "SELECT * FROM likedRestaurant where username = '$userDown' and disliked IS NOT NULL and liked IS NULL";

($a = mysqli_query($db,$query7) ) or die(mysqli_error($db) );

#dislike table
echo "<br><br>Here are your disliked restaurants<br>";

              
echo "<table border =2 width = 50%>";

echo "<tr>";

echo "<td>username</td>";

echo "<td>disliked</td>";

echo "<td>Date</td>";

while($r = mysqli_fetch_array ($a, MYSQLI_ASSOC) )

{

	$uname = $r["username"];

	$disliked = $r["disliked"];

	$date = $r["created_at"];

	echo "<tr>";

	echo "<td>$uname</td>";

	echo "<td>$disliked</td>";

	echo "<td>$date</td>";



};

echo "</table>";

echo "<br><br>";

?>


<a href= "resetDislikes.php" value =<?php echo $_SESSION["Restaurant"] ?> > Reset Your Disliked Restaurants
        
</a>

<?php

#start liked table
$query8 = "SELECT * FROM likedRestaurant where username = '$userDown' and disliked IS NULL and liked IS NOT NULL";

($b = mysqli_query($db,$query8) ) or die(mysqli_error($db) );


echo "<br><br>Here are your liked restaurants<br>";


echo "<table border =2 width = 50%>";

echo "<tr>";

echo "<td>username</td>";

echo "<td>liked</td>";

echo "<td>Date</td>";

while($x = mysqli_fetch_array ($b, MYSQLI_ASSOC) )

{

        $uname2 = $x["username"];

        $liked = $x["liked"];

        $date2 = $x["created_at"];

        echo "<tr>";

        echo "<td>$uname2</td>";

        echo "<td>$liked</td>";

        echo "<td>$date2</td>";



};
echo "</table>";

echo "<br><br>";

?>

<a href= "resetLikes.php" value =<?php echo $_SESSION["Restaurant"] ?> > Reset Your Liked Restaurants

</a>


</body>
</html>
