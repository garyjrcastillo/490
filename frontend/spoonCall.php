<?php

require_once 'src/Unirest.php';

//$input = "burger";

$response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/food/menuItems/search?query=$input",
  array(
    "X-Mashape-Key" => "iNZANIulJZmsh726UKyfHfPDefuGp15u89ajsnohOaqZ5tBKfe",
    "X-Mashape-Host" => "spoonacular-recipe-food-nutrition-v1.p.mashape.com"
  )
);

$matches = json_decode($response->raw_body);
//var_dump($matches);

//echo $matches->menuItems[0]->id;
//echo "\n";


$id = $matches->menuItems[0]->id;


//echo $matches->menuItems[0]->image;


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

echo "\n";
?>
