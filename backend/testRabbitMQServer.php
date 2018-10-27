#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
	include('config.php');
	echo "LOGIN CHECK";


	$query = "SELECT * FROM loginform WHERE username = '$username' and password= '$password' ";
	print"<br>SQL Select statement is: $query<br>" ;
	$result = mysqli_query($db,$query) or die(mysqli_error($db));
	$count = mysqli_num_rows($result);
	
	//IF THE USER / PASS ARE CORRECT
	if ($count==1){
		echo "WORKED";
		return true;
			
	}
	else{
		echo  "INVALID USERNAME AND PASSWORD";
		return false;
	}    
        // lookup username in databas
        // check password
	
	#return true;
	
	//return false if not valid
}

function doRegister($username, $password)
{
	
	include('config.php');

	$s = "insert into loginform (username, password)  values ('$username','$password' ) ";
	print "<br>SQL Insert statement is $s ";

	//($t = mysqli_query($db,$s) ) or die(mysqli_error($db) );

	//print "<br>SQL Insert loginform statement was transmitted for execution.<br>";

	if( $t=mysqli_query($db,$s) ){
		return true;
	}
	else{
		return false;
	}
}

function doValidate($sessionId){
	if ($sessionId == 'random')
	{
		return true;
	}	
	else{
		return false;
	}
}

function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "login":
      return doLogin($request['username'],$request['password']);

    //case "register":
//	    return true;
    case "register":
      return doRegister($request['username'],$request['password']);

    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

