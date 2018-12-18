<?php
session_start();

echo "<br>TESTTTTTTT1234". $_SESSION["Restaurant"] . "<br>";#
echo "<br>". $_SESSION["Restaurant"] . "<br>";#

$Restaurant = $_SESSION["Restaurant"];
echo "OKKK" . $Restaurant ;



$userDown = $_SESSION["un"];

echo "name of food: ". $_SESSION["foodVar"];

$foodDown = $_SESSION["foodVar"];

include ('config.php');

#delete any previos dislikes with the same as the food suggested.

$Restaurant2 = mysqli_real_escape_string($db,$Restaurant);




$query3 = "SELECT * FROM likedRestaurant where username = '$userDown' and disliked = '$Restaurant2' ";

($z = mysqli_query($db,$query3) ) or die(mysqli_error($db) );

$num = mysqli_num_rows($z);

if($num==1)
{
        $query4= "delete from likedRestaurant where username = '$userDown' and disliked = '$Restaurant2' ";
        ($x = mysqli_query($db,$query4) ) or die(mysqli_error($db) );

        echo "<br> deleted disliked same name <br>";

}

#delete any previous likes with the same name as the food suggested.

$query5 = "SELECT * FROM likedRestaurant where username = '$userDown' and liked = '$Restaurant2' ";
($y = mysqli_query($db,$query5) ) or die(mysqli_error($db) );
$num2 = mysqli_num_rows($y);

if($num2==1)
{
        $query6= "delete from likedRestaurant where username = '$userDown' and liked = '$Restaurant2' ";
        ($v = mysqli_query($db,$query6) ) or die(mysqli_error($db) );

        echo "<br> deleted liked same name<br>";
}













$query = "insert into likedRestaurant (username, liked) values ('$userDown','$Restaurant2') ";#


($x = mysqli_query($db,$query) ) or die(mysqli_error($db) );

echo "SQL Insert into liked column  was transmitted for execution.";

#header( "refresh:5; url= mainpage.php");
header('Location: mainpage.php');
?>

