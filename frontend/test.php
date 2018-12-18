<?php
session_start();


unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)

unset($_SESSION["api"]);

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



                <li class="nav-item active">
                        <a class="nav-link" href="likes.php">Likes Record</a>
                </li>

 		<li class="nav-item">
 			<a class="nav-link" href="logout.php">Log out</a>
 	 		</li>
 		</ul>
 	</div>
</div>
</nav>

<!--- Image Slider -->
<!--- Welcome Section -->

<?php

#session_start();

#echo "session id: " . $_SESSION["sessionId"]; #
#echo "username: " . $_SESSION["un"]; #

echo "Hello " . $_POST["username"]. "!<br> Here are your results!"; #
echo "<br><br>";
echo "Number of calories for the fast food items you have eaten today:<br>";

//first input

if($_POST["item1"] != "" ){
	$input = $_POST["item1"] ;

	echo "$input = ";

	include("spoonCall.php");

	echo "<br>";


	$total = $total + $calories;
}

//SECOND INPUT


if($_POST["item2"] != "" ){

	$input = $_POST["item2"];

	echo "$input = ";


	include("spoonCall.php");

	echo "<br>";


	$total = $total + $calories;


}


//third submit


if($_POST["item3"] != "" ){

        $input = $_POST["item3"];

	echo "$input = ";



        include("spoonCall.php");


	echo "<br>";

        $total = $total + $calories;

}



if($_POST["item4"] != "" ){

        $input = $_POST["item4"];

       
	echo "$input = ";

        include("spoonCall.php");

	echo "<br>";

        $total = $total + $calories;
        

}

if($_POST["item5"] != "" ){

        $input = $_POST["item5"];

        
	echo "$input = ";

        include("spoonCall.php");

	echo "<br>";

        $total = $total + $calories;
        

}



echo "<br>Total Amount of Calories you've consumed today: $total <br>";
//LAST INPUT MAX


$max = $_POST["item6"];
echo "<br>Your daily max calorie goal is $max <br>";

if($total > $max){
	echo "<br>We can not suggest you a food because you have already passed your calorie goal of the day";
	exit;

}
else{

	$remainingCalories = $max - $total;
	echo "<br>Your remaining calorie intake for today is: ". $remainingCalories ."<br>";

	echo"<br>We will now use your location with the Google Maps API to get the 20 nearest fast food restaurants near you <br>";
	


	#--$location = $_POST["item7"];

	$location = urlencode($_POST["item7"]);
	include ("mapsCall.php");


	include ("calorieCall.php");


//	include ("spoonCallSuggestion.php");

	
#	echo "username: " . $_SESSION["un"] ;



}


//maps api call
//$location = $_POST["item7"];


?>

<body>


<img src= '<?php echo $src?>'>
<br>

Do you Like Food From <?php echo $fastFoodRestaurant?> ?
<a href= "thumbsup.php" value =<?php echo $_SESSION["Restaurant"] ?> >
	<img src="img/thumbs-up.png" style="width:100px;height:100px;">
</a>

<a href= "thumbsdown.php" value =<?php echo $_SESSION["Restaurant"] ?> >
        <img src="img/thumbs-down.png" style="width:100px;height:100px;">
</a>

<br>

<br>
</body>
<?php

	$leftover = $remainingCalories - $matches3->nutrition->calories;
	echo "Your remaining  calories for the day after this eating this fast food item is: ".$leftover;

?>
<body>
<br>
<a href="historyrecord.php" value = <?php echo $_SESSION["un"] ?> >View History of Suggested Fast Food Items
</a>

</body>

<!--- Three Column Section -->


<!--- Two Column Section -->


<!--- Fixed background -->

<!--- Emoji Section -->

<div id="emoji" class="collapse">
	<div class="container-fluid padding">
	<div class="row text-center">
		<div class="col-sm-6 col-md-3">
			
		
			<img class="gif" src="img/gif/panda.gif">
		</div>
		<div class="col-sm-6 col-md-3">
			<img class="gif" src="img/gif/poo.gif">
		</div>
		<div class="col-sm-6 col-md-3">
			<img class="gif" src="img/gif/unicorn.gif">
		</div>
		<div class="col-sm-6 col-md-3">
			<img class="gif" src="img/gif/chicken.gif">
		</div>

</div>
</div>
</div>

<!--- Meet the team -->

<!--- Cards -->

<!--- Connect -->
<div class="container-fluid padding">
<div class="row text-center padding">
	<div class="col-12">
		<h2>Connect</h2>
	</div>

</div>
</div>

<!--- Footer -->
<footer>
<div class="container-fluid padding">
<div class="row text-center">
	<div class="col-md-4">
		<img src="img/logo2.png">
		<hr class="light">
		<p>555-555-555</p>
		<p>njit@edu</p>
		<p>123 street</p>
		<p>Newark, NJ, 0000</p>
	</div>

	<div class="col-md-4">
		<hr class="light">
		<h5>Contact Us </h5>
		<hr class="light">
		<p>stuff</p>
		<p>stuff</p>
		<p>stuff</p>
	</div>
	<div class="col-md-4">
		<hr class="light">
		<h5>Something</h5>
		<hr class="light">
		<p>  00000</p>
		<p>  00000</p>
		<p>  00000</p>
		<p>  00000</p>
		<p>  00000</p>
	</div>
	<div class="col-12">
		<hr class="light-100">
		<h5>&copy; copyright@2018</h5>
	</div>

</div>
</div>
</footer>

</body>
</html>















?>
