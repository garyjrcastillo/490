<?php

//$location =  "passaic,nj";

$response = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=fast+food+restaurants+in+'.$location.'&key=AIzaSyA7M77mLfVDXW9Nl07w35OzogqgHb_ulzY';

//returns 20 results aka array 0-19.

$matches = json_decode(file_get_contents($response));
//var_dump($matches);


//echo $matches->results[0]->name;

//echo $matches->results[rand(0,19)]->name;

//have an array of fast food restaurants that spoonacular Website  can search for..
$fastFoodArray = array("Wendy's","Burger King","McDonald's","White Castle","KFC","Subway");
$arrLength = count($fastFoodArray);


$flag= true;

for ($x =0; $x <20;$x++){
	if ($flag==false){
		break;
	}

//	echo $matches->results[$x]->name;

	echo "<br>";

	$fastFoodRestaurant = $matches->results[$x]->name;

	for ($y=0;$y<$arrLength;$y++)
    {	
	if($fastFoodRestaurant == $fastFoodArray[$y])
	{
		
		echo "Your suggest fast food restaurant based on your location is: ". $fastFoodRestaurant . "<br>";
		
		require_once 'src/Unirest.php';
//returns item from fast food restaurant if it is in our array, and also has a paramter of max calories based on users remaining caloires

		$response2 = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/menuItems/search?query=$fastFoodRestaurant&maxCalories=$remainingCalories",
		  array(
		"X-Mashape-Key" => "iNZANIulJZmsh726UKyfHfPDefuGp15u89ajsnohOaqZ5tBKfe",
	    	"X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
 			 )
		);

		//returns 10 results, array 0-9

		$matches2 = json_decode($response2->raw_body);
		//var_dump($matches);

		echo "Your Suggested fast food item is: ";



		$randomFood = rand(0,9);

		//echo $randomFood;

		echo $matches2->menuItems[$randomFood]->title; //here we return the first menu item that comes after we search a fast food restaurant.


		echo "<br>";


		$id = $matches2->menuItems[$randomFood]->id;

//		echo $matches2->menuItems[0]->image;


		$src = $matches2->menuItems[$randomFood]->image;


		$flag=false;
		break;
	
	//	exit();


		


	}
	
     }
	echo "<br>";
}








?>
