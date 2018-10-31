#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function doLogin($username,$password)
{
	include('config.php');
	

	$query = "SELECT * FROM loginform WHERE username = '$username' and password= '$password' ";
	print("\n"."SQL Select statement is: $query"."\n") ;
       

	if(!mysqli_query($db,$query)){
	       	error_log("\n". mysqli_error($db)." \n" ,3, "/home/gary/490/backend/log2.txt");
	}


	$count = mysqli_num_rows(mysqli_query($db,$query));


			
	//IF THE USER / PASS ARE CORRECT
	if ($count==1){
		echo "\n"."Login Successfull". "\n";
		return true;
			
	}
	else{
		echo  "\n". "Login Failure" ."\n";
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
	print "\n"."SQL Insert into statement is $s"."\n";

	($t = mysqli_query($db,$s) ) or die(mysqli_error($db) );

	print "\n". "SQL Insert into loginform statement was transmitted for execution."."\n";


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
		echo "\n". "Session validated". "\n";
		return true;
	}	
	else{
		echo "\n"."Session not validated. Returned to index.php"."\n";
		return false;
	}
}

function requestProcessor($request)
{
  echo "\n"."Received request:".PHP_EOL. "\n" ;
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

