<?php
$hostname ="localhost";
$usernameSQL="gary";
$passwordSQL="gary";
$database="users";

$db = mysqli_connect($hostname,$usernameSQL,$passwordSQL,$database);
if (mysqli_connect_errno())
{
	echo ("\n"."Failed to connect to MySQL: " . mysqli_connect_error() . "\n" );
	error_log(mysqli_connect_error(),3,"/home/gary/490/backend/log2.txt");
        exit();
}
print("\n"."Succesfully connected to MySQL."."\n");
mysqli_select_db($db,$database);

#mysqli_close($db);
#exit("<br> Interaction completed.<br><br>"); #this will not let the html come up.

?>
