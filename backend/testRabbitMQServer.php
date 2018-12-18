#!/usr/bin/php
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
//
#session_start(); #
function doLogin($username,$password)
{
	include('config.php');
	$_SESSION["uname"] = $username; #


	$query = "SELECT * FROM loginform WHERE username = '$username' and password= '$password' ";
#	print("\n"."SQL Select statement is: $query"."\n") ;
       

	($t = mysqli_query($db,$query) ) or die(mysqli_error($db) );

#	   if(!mysqli_query($db,$query)){
#                error_log("\n". mysqli_error($db)." \n" ,3, "/home/gary/490/backend/log2.txt");
#        }



	$count = mysqli_num_rows(mysqli_query($db,$query));


			
	//IF THE USER / PASS ARE CORRECT
	if ($count==1){
		echo "\n"."Login Successfull". "\n";

		$random = substr(str_shuffle(MD5(microtime())),0,8);

		$setID = "UPDATE loginform SET sessionID = '$random' WHERE username = '$username' ";

		($g = mysqli_query($db,$setID) ) or die(mysqli_error($db) );


		$_SESSION["setID"] = $random;	
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
#	print "\n"."SQL Insert into statement is $s"."\n";

	($t = mysqli_query($db,$s) ) or die(mysqli_error($db) );



#	print "\n". "SQL Insert into loginform statement was transmitted for execution."."\n";



#	$query = "insert into foodHistory WHERE username = '$username' ";#
#        ($x = mysqli_query($db,$query) ) or die(mysqli_error($db) );


	if( $t == true ){
		echo "Registration Successful";
		return true;
	}
	else{
		echo "Registration Failure";
		return false;
	}
}

function doValidate($sessionId){
	#if ($sessionId == 'random')
	if ($sessionId == $_SESSION["setID"] )
	{
		echo "\n". "Session validated". "\n";
		#echo "username is" . $_SESSION["uname"] ; #
		return true;
	}	
	else{
		echo "\n"."Session not validated. Returned to index.php"."\n";
		return false;
	}
}

#function doLogs($test){
function doLogs(){
	echo "TESTING \n";
	return true;	
}

function doAPI($name){
        #echo "$name \n";
        return true;
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
    case "get_logs":
	    return doLogs();
    case "get_api":
        return doAPI($request['name']);

      #return doLogs($request['test']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");

echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>

