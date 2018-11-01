<?php

session_start();

unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)


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
 			<a class="nav-link" href="#">Home</a>
 		</li>
 		<li class="nav-item">
 			<a class="nav-link" href="#about">About</a>                     
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
		<img src="img/drinks.jpg">
	</div>
	<div class="carousel-item">
		<img src="img/taco.jpg">
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
		<p class="lead">Our Project's objective is to suggest users a restaurant food item that meets their desired daily maximum calorie intake and their location. </p>

</div>
</div>

<!--- Three Column Section -->

<hr class="my-4">


<!--- Two Column Section -->

<form method="post" action = "test.php">
<div class="container-fluid padding">
<div class="row padding">
	<div class="col-md-12 col-lg-6">
		<h2>Please Tell Us What You Ate Today! </h2>
		<p> .</p>
		<div class="form-group">
    <label for="exampleFormControlInput1">Item 1</label>
    <input type="text" class="form-control" id="Item1" name="item1" placeholder="Enter Food or Drink "> 
   <select name="select1">
	<option value= "GroceryFood">Grocery Food</option>
	<option value= "FoodMenu"> Food Menu</option>
  </select>
<br>
    <label for="exampleFormControlInput1">Item 2</label>
    <input type="text" class="form-control" id="Item2" name="item2" placeholder="Enter Food or Drink">
<select name = "select2">
        <option value= "GroceryFood">Grocery Food</option>
        <option value= "FoodMenu"> Food Menu</option>
  </select>
<br>
    <label for="exampleFormControlInput1">Item 3</label>
    <input type="text" class="form-control" id="Item3" name ="item3" placeholder="Enter Food or Drink">

<select name = "select3">
        <option value= "GroceryFood">Grocery Food</option>
        <option value= "FoodMenu"> Food Menu</option>
  </select>
<br>
    <label for="exampleFormControlInput1">Item 4</label>
    <input type="text" class="form-control" id="Item4" name="item4" placeholder="Enter Food or Drink">

<select name= "select4">
        <option value= "GroceryFood">Grocery Food</option>
        <option value= "FoodMenu"> Food Menu</option>
  </select>
<br>
    <label for="exampleFormControlInput1">Item 5</label>
    <input type="text" class="form-control" id="Item5" name="item5" placeholder="Enter Food or Drink">
   <select name= "select5">

	<option value = "GroceryFood">Grocery Food</option>
	<option value = "FoodMenu"> Food Menu</option>

  </select>
<br>
   <label for="exampleFormControlInput1"> Max Calories (Required) </label>
   <input type = "text" class = "form-control" id = "Item6" name = "item6" placeholder = "Enter your desired Max Calories per day" required>



   <label for ="exampleFormControlInput1">Location (Required)</label>
   <input type = "text" class = "form-control" id = "Item7" name = "item7" placeholder = "Enter City and state" required>


    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-block btn-lg">



  </div>




		<br>
		


</div>
</div>

</form>


<hr class="my-4">


<!--- API -->
<div class="container-fluid padding">
<div class="row welcome text-center">
	<div class="col-12">
		<h1 class="display-4"> APIs</h1> 
	</div>
	<hr>
	<div class="col-12">
		<p class="lead">APIs used: Spoonacular and Google Maps </p>

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













