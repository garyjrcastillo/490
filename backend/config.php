<?php
$hostname ="localhost";
$usernameSQL="gary";
$passwordSQL="gary";
$database="users";
error_reporting(E_ERROR | E_PARSE | E_NOTICE);
ini_set('displayerrors', 1);
$db = mysqli_connect($hostname,$usernameSQL,$passwordSQL,$database);
if (mysqli_connect_errno())
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
}
print"<br>Succesfully connected to MySQL.<br>";
mysqli_select_db($db,$database);
#mysqli_close($db);
#exit("<br> Interaction completed.<br><br>"); #this will not let the html come up.
?>
