<?php
session_start();
unset( $_SESSION["register"] ); //so when rabbitMQClient executes it won't use the register function
unset( $_SESSION["index"] ); //so when rabbitMQClient executes it won't use the index function (which is logging in)

unset( $_SESSION["validate"]);
$_SESSION["api"] = 'true';
$_SESSION["apiName"] = 'spoonacular users food calories';
include('testRabbitMQClient.php');



require_once 'src/Unirest.php';

#$input = "burger";

$response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/menuItems/search?query=$input",
  array(
    "X-Mashape-Key" => "iNZANIulJZmsh726UKyfHfPDefuGp15u89ajsnohOaqZ5tBKfe",
    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
  )
);

$matches = json_decode($response->raw_body);
#var_dump($matches);

//echo $matches->menuItems[0]->id;
//echo "\n";


$id = $matches->menuItems[0]->id;


#echo $matches->menuItems[0]->title;


//print($response->code);
//print($response->headers);
//print($response->raw_body);

//$json = $response->headers;

//$ar = json_decode($response);
//echo $ar[0];

$response2 = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/menuItems/$id",
  array(
    "X-Mashape-Key" => "iNZANIulJZmsh726UKyfHfPDefuGp15u89ajsnohOaqZ5tBKfe",
    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
  )
);

 
$matches2 = json_decode($response2->raw_body);
//var_dump($matches2);

echo $matches2->nutrition->calories;

$calories = $matches2->nutrition->calories;

echo " (Spoonacular retrieved this calorie estimate from: ". $matches->menuItems[0]->title . ")";
 

echo "\n";
?>
