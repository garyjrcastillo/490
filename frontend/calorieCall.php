<?php
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
