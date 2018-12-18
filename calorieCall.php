<?php
session_start();
unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)

unset( $_SESSION["validate"]);
$_SESSION["api"] = 'true';
$_SESSION["apiName"] = 'spoonacular calories leftover';


include('testRabbitMQClient.php');

require_once 'src/Unirest.php';

//echo $ar[0];


$response3 = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/menuItems/$id",
  array(
    "X-Mashape-Key" => "iNZANIulJZmsh726UKyfHfPDefuGp15u89ajsnohOaqZ5tBKfe",
    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
  )
);
$matches3 = json_decode($response3->raw_body);

echo "Number of Calories this item has: ";

echo $matches3->nutrition->calories;
echo "<br>";
?>
