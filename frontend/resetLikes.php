<?php
session_start();
$userDown = $_SESSION["un"];

echo "Hello $userDown !";

include('config.php');

$query7 = "DELETE FROM likedRestaurant where username = '$userDown' and disliked IS NULL and liked IS NOT NULL";

($a = mysqli_query($db,$query7) ) or die(mysqli_error($db) );

header('Location: mainpage.php');

?>
