
<?php
session_start();

$input = $_POST["item1"] ;

echo " $input calories: ";

include("spoonCall.php");


$total = $total + $calories;
echo "TOTAL CALORIES NOW is $total";


//SECOND INPUT

$input = $_POST["item2"];

echo " $input calories: ";


include("spoonCall.php");

$total = $total + $calories;
echo "TOTAL CALORIES NOW is $total";

//LAST INPUT MAX
$max = $_POST["item6"];

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
 			<a class="nav-link" href="#">Home</a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="#about">About</a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="#">Testing </a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="#team">Team Members</a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="#">Contact</a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="logout.php">Log out</a>
 	 		</li>
 		</ul>
 	</div>
</div>
</nav>

<!--- Image Slider -->

<!--- Jumbotron -->
<div class="container-fluid">
<div class="row jumbotron">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
		<p class="lead">This will be some paragraph/text that we will be putting in . Need to be changed.</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
		<a href="#"><button type= "button class="btn btn-outline-secondary btn-lg> Button</button></a>
	</div>
</div>
</div>

<!--- Welcome Section -->

<?php
session_start();

$input = $_POST["item1"] ;

echo " $input calories: ";

include("spoonCall.php");


$total = $total + $calories;
echo "TOTAL CALORIES NOW is $total";


//SECOND INPUT

$input = $_POST["item2"];

echo " $input calories: ";


include("spoonCall.php");

$total = $total + $calories;
echo "TOTAL CALORIES NOW is $total";

//LAST INPUT MAX
$max = $_POST["item6"];

?>




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
