<?php
session_start(); #-----
unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)

unset( $_SESSION["validate"]);
$_SESSION["api"] = 'true';
$_SESSION["apiName"] = 'Google Maps';

include('testRabbitMQClient.php');



//$location =  "passaic,nj";
#location cannot be seperated by spaces because it is part of url query string. can include +
$response = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=fast+food+restaurants+in+'.$location.'&key=AIzaSyA7M77mLfVDXW9Nl07w35OzogqgHb_ulzY';

//returns 20 results aka array 0-19.

$matches = json_decode(file_get_contents($response));
//var_dump($matches);

#GOOGLE MAPS API CALL GIVES US A LIST OF THE 20 CLOSEST FAST FOOD  RESTAURANTS NEAR USERS LOCATION
#

include ('config.php');


$fastFoodArray = array("Wendy's","Burger King","McDonald's","White Castle","KFC","Subway");
$arrLength = count($fastFoodArray);

#print_R($fastFoodArray);

echo "<br>Due to the limitation of spoonacular API, we will suggest you a fast food item from the following DEFAULT fast food restaurant list: ";
foreach ($fastFoodArray as $value)
{
        echo "$value, ";
}



echo "<br>";

shuffle($fastFoodArray);



#-----------$_SESSION["foodVar"] = $foodVar;

#1 : check for any disliked restaurants and remove from array

$un = $_POST["username"];


$query7 = "SELECT * FROM likedRestaurant where username = '$un' and disliked IS NOT NULL and liked IS NULL";

($a = mysqli_query($db,$query7) ) or die(mysqli_error($db) );


$num = mysqli_num_rows($a);

echo "<br>";
echo "Restaurants you dislike:";
if($num>=1) 
{
#	echo "Restaurants you dislike:";	
	while($b = mysqli_fetch_array ($a, MYSQLI_ASSOC) )
	{
		#echo "<br> test <br>";   
		$restaurantDisliked = $b["disliked"];
		echo $restaurantDisliked . ", ";
		
		for($f=0;$f<$arrLength;$f++)
		{
			
			#echo $fastFoodArray[$f];
			if ($fastFoodArray[$f] == $restaurantDisliked)
			{
				unset($fastFoodArray[$f]);
			}
			#echo "<br><br>";

		}



       	};


}
echo "<br><br>";


#2 : check for any liked restaurants and make it the first restaurant to be searched from

$query8 = "SELECT * FROM likedRestaurant where username = '$un' and liked IS NOT NULL and disliked IS NULL";

($d = mysqli_query($db,$query8) ) or die(mysqli_error($db) );

#echo "<br> SQL TRANSMITTED<br>";

$num2 = mysqli_num_rows($d);

#echo "<br>num: ". $num2;


echo "Restaurants you like:";

if($num2>=1)
{
        #echo "Restaurants you like:";
        while($e = mysqli_fetch_array ($d, MYSQLI_ASSOC) )
        {
                #echo "<br> test <br>";
                $restaurantLiked = $e["liked"];
                echo $restaurantLiked . ", ";

               for($f=0;$f<$arrLength;$f++)
               {

                #        echo $fastFoodArray[$f];
                       if ($fastFoodArray[$f] == $restaurantLiked)
		       {
			       
			       $array=$fastFoodArray[$f];
			       unset($fastFoodArray[$f]);

                                array_unshift($fastFoodArray,$array);
                        }
                      

               }



        };


}

echo "<br><br>";
#

echo "<br>This is your custom list of fast food Restaurants we will suggest from based on your likes and dislikes: ";
foreach ($fastFoodArray as $value)
{
        echo "$value, ";
}



#foreach ($fastFoodArray as $value)
#{
#	echo "$value<br>";
#}


$flag= true;
#for loop through the array of 20 fast food restaurants near users locaiton

#---for ($x =0; $x <20;$x++){
for ($y=0;$y<$arrLength;$y++){
	if ($flag==false){
		break;
	}

//	echo $matches->results[$x]->name;


	#grab the current fast food restaurant from the iteration of the for loop going through the fast food restaurants near users location.
	
	#$fastFoodRestaurant = $matches->results[$x]->name;

#------	echo "Your suggested fast food restaurant from the google maps api is:".$fastFoodRestaurant;
	#for loop through the array i created of fast food restrautants spponacular api is capable of getting data from.
	
	
	#---for ($y=0;$y<$arrLength;$y++)
	for ($x =0; $x <20;$x++)
	{
		$fastFoodRestaurant = $matches->results[$x]->name;
		 #echo "Your suggested fast food restaurant from the google maps api is:".$fastFoodRestaurant;

		
		$_SESSION["Restaurant"] = $fastFoodRestaurant; #
		#echo "<br>TESTTTTTTT1234". $_SESSION["Restaurant"] . "<br>";#


	#Example: if google maps result is Wendys as the first result, then this for loop will check if any item in the array of spoonacular capable restaurants is a match. If it is a match, we continue.	
	if($fastFoodRestaurant == $fastFoodArray[$y])
	{
		
	echo "<br><br>Your suggest fast food restaurant based on your location is and your liked and disliked Restaurants is: ". $fastFoodRestaurant . "<br>";
		
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



		$_SESSION["apiName"] = 'spoonacular search food based on remaining calories';

		include('testRabbitMQClient.php');


		echo "<br>We will now suggest you a random fast food item from $fastFoodRestaurant based on your leftover calories for the day! <br>";
		echo "<br>Your Suggested fast food item is: ";



		$randomFood = rand(0,9);

		//echo $randomFood;

		#echo $matches2->menuItems[$randomFood]->title; //here we return a random fast food menu item, we randomly select the 1st - 10th result from the spoonacular search results.

		$foodVar = $matches2->menuItems[$randomFood]->title; #store the selected food in a variable

		#$foodVar = 'Taco Salad'; #this is for testing purposes, to show that users is not able to get the same food twice.

		echo $foodVar;

		#-----------------------------$_SESSION["foodVar"] = $foodVar;

		#CHECK IF LAST FOOD IS SELECTED
		#---------include ('config.php');

		#-----------------$un = $_POST["username"];


		$query3 = "SELECT * FROM historyFood where username = '$un' ORDER BY created_at DESC LIMIT 1";

		($z = mysqli_query($db,$query3) ) or die(mysqli_error($db) );

		#echo "SQL SELECT TRANSMITTED";
		$q = mysqli_fetch_array ($z, MYSQLI_ASSOC);
		$lastFood = $q["foodName"]; #grabs the most recent food the user has been suggested.


		#echo "<br>username:" . $un;
		#echo "<br>Last FOOD: " . $lastFood;


		echo "<br>";

		#grabs the suggested food name, and store it into historyFood Table:

		if ($foodVar == $lastFood)
		{

			echo "Oops the fast food item we suggested is a fast food item that you were suggested last time. Please try again.";
			exit;
			
		}


		$un = $_POST["username"];
		#echo "USERNAME1111: " . $un;		
		#echo "$foodVar";
		#include ('config.php');

		$query = "insert into historyFood (username, foodName) values ('$un','$foodVar') ";#
	        ($x = mysqli_query($db,$query) ) or die(mysqli_error($db) );
		
		#echo "SQL Insert into foodHistory statement was transmitted for execution.";
		
		

		#
		#Store liked and disliked restaurants

		

		$id = $matches2->menuItems[$randomFood]->id;

//		echo $matches2->menuItems[0]->image;


		$src = $matches2->menuItems[$randomFood]->image;


		$flag=false; #this allows the first for loop to break if we got a right match.
		break; #this break the current (2nd) loop
	
	//	exit();


		


	}#end if loop

	#----------------break;
     	}#end for loop that goes through custom array 
	echo "<br>";
}#end for loop that goes through the 20 closest fast food restuarants near users location




if($flag==true)
{
	exit("Unable to find a suggestion that matches your needs");
}



?>
