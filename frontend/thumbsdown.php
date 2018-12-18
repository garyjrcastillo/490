<?php
session_start();

echo "ok";

echo "<br>TESTTTTTTT1234". $_SESSION["Restaurant"] . "<br>";#
echo "<br>". $_SESSION["Restaurant"] . "<br>";#

$Restaurant = $_SESSION["Restaurant"];
echo "OKKK" . $Restaurant ;

echo "<br> test <br>";

$userDown = $_SESSION["un"];

echo "<br> username : " . $userDown;


echo "name of food: ". $_SESSION["foodVar"];

$foodDown = $_SESSION["foodVar"];

include ('config.php');

#delete any previos dislikes with the same as the food suggested.

$Restaurant2 = mysqli_real_escape_string($db,$Restaurant);

echo "<br> check <br>";

$query3 = "SELECT * FROM likedRestaurant where username = '$userDown' and disliked = '$Restaurant2' ";

echo $query3;

($z = mysqli_query($db,$query3) ) or die(mysqli_error($db) );

echo "<br> check <br>";


$num = mysqli_num_rows($z);

if($num==1)
{
	echo "<br> check <br>";
	$query4= "delete from likedRestaurant where username = '$userDown' and disliked = '$Restaurant2' ";
	($x = mysqli_query($db,$query4) ) or die(mysqli_error($db) );

	echo "<br> deleted disliked same name <br>";

}

#delete any previous likes with the same name as the food suggested.

$query5 = "SELECT * FROM likedRestaurant where username = '$userDown' and liked = '$Restaurant2' ";
($y = mysqli_query($db,$query5) ) or die(mysqli_error($db) );
$num2 = mysqli_num_rows($y);


echo "<br> check <br>";



if($num2==1)
{
	echo "<br> check <br>";

	$query6= "delete from likedRestaurant where username = '$userDown' and liked = '$Restaurant2' ";
        ($v = mysqli_query($db,$query6) ) or die(mysqli_error($db) );

	echo "<br> deleted liked same name<br>";
}




#insert
$query = "insert into likedRestaurant (username, disliked) values ('$userDown','$Restaurant2') ";#


($x = mysqli_query($db,$query) ) or die(mysqli_error($db) );

echo "SQL Insert into disliked column  was transmitted for execution.";

#header( "refresh:5; url= mainpage.php");
header('Location: mainpage.php');
?>
