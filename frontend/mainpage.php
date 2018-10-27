<?php

session_start();

unset( $_SESSION["register"] );
unset( $_SESSION["index"] );

$_SESSION["validate"] = 'true';
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
<div id="slides" class="carousel slide" data-ride="carousel">
<ul class="carousel-indicators">
	<li data-target="#slides" data-slide-to="0" class="active"></li>
	<li data-target="#slides" data-slide-to="1"></li>
	<li data-target="#slides" data-slide-to="2"></li>
</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="img/burger.jpg">
		<div class="carousel-caption">
			<h1 class="display-2">Fantastic 4</h1>
			<h3> Welcome to our Website</h3>
			
		</div>
	</div>
	<div class="carousel-item">
		<img src="img/background.png">
	</div>
	<div class="carousel-item">
		<img src="img/background.png">
	</div>
</div>
</div>

<!--- Jumbotron -->
<div class="container-fluid">
<div class="row jumbotron">
	<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
		<p class="lead">This will be some paragraph/text that we will be putting in . Need to be changed.</p>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
		<a href="#"><button type= "button class="btn btn-outline-secondary btn-lg"> Button</button></a>
	</div>
</div>
</div>

<!--- Welcome Section -->
<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4"> IT490 Project</h1> 
	</div>
	<hr>
	<div class="col-12">
		<p class="lead">IT490 Project Paragraph!!! Leaving this area as of now so we can add more description to it later. (or we could put the api stuff here in this section) </p>

</div>
</div>

<!--- Three Column Section -->

<hr class="my-4">


<!--- Two Column Section -->
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-md-12 col-lg-6">
		<h2>Just leave it here to add stuff </h2>
		<p> paragraph fkelwajfekwla fkwlaef jweklfjwkleaf jwklaef jewklaf jweklfj awlekfj ekwa.</p>
		<p> gewijgkwleajgklweagjkwleagjklwegj klwgklw jgklwe gjwlek gjweklag jwakleg jweklg jwekl</p>
		<p> gjewklagjwekla gkwleg jwklag jwelkag jweklag jwalkeg jwaeklg jweklag jwekalg jwkel gawl</p>
		<br>
		
	</div>
	<div class="col-lg-6">
		<img src="img/placeholder.png" class="img-fluid">
	</div>

</div>
</div>

<hr class="my-4">
<!--- Fixed background -->
<figure>
	<div class="fixed-wrap">
		<div id="fixed">
		</div>
	</div>

</figure>

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
<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4">Team Members</h1>
	</div>
	<hr>

</div>
</div>

<!--- Cards -->
<section class="team" id="team">
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/nopicture.png">
			<div class="card-body">
				<h4 class="card-title">Gary Castillo</h4>
				<p class="card-text">TEAM MEMBER GARY CASTILLO.</p>
				<a href="#" class="btn btn-outline-secondary">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/nopicture.png">
			<div class="card-body">
				<h4 class="card-title">Nithin Dronavalli</h4>
			<p class="card-text">TEAM MEMBER Nithin Dronavalli</p>
				<a href="#" class="btn btn-outline-secondary">See Profile</a>
			</div>
		</div>
	</div>


	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/nopicture.png">
			<div class="card-body">
				<h4 class="card-title">Denion Kaleci</h4>
			<p class="card-text">TEAM MEMBER Denion Kaleci</p>
				<a href="#" class="btn btn-outline-secondary">See Profile</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<img class="card-img-top" src="img/nopicture.png">
			<div class="card-body">
				<h4 class="card-title">Yik Tam </h4>
			<p class="card-text">TEAM MEMBER Yik Tam </p>
				<a href="#" class="btn btn-outline-secondary">See Profile</a>
			</div>
		</div>
	</div>

</div>
</div>

<!--- Two Column Section -->
<section class="about" id="about">
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-md-12 col-lg-6">
		<h2>About Us</h2>
		<p> paragraph fkelwajfekwla fkwlaef jweklfjwkleaf jwklaef jewklaf jweklfj awlekfj ekwa.</p>
		<p> gewijgkwleajgklweagjkwleagjklwegj klwgklw jgklwe gjwlek gjweklag jwakleg jweklg jwekl</p>
		<br>
		
	</div>
	<div class="col-lg-6">
		<img src="img/placeholder.png" class="img-fluid">
	</div>

</div>
<hr class="my-4">
</div>

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













