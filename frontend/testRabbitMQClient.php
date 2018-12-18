
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

#include("index.php");


session_start();
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}



if(isset($_SESSION["index"])){
$request = array();

//if(isset($_SESSION["index"])){
	$request['type'] = "login";
	$request['username'] = $_POST['username'];
	$request['password'] = $_POST['password'];
	
	$_SESSION["un"] = $_POST['username']; #
	$un = $_POST['username']; #	
//	$request['username'] = 'test';
	
//	$request['password'] = 'test';
	
	$request['message'] = $msg;
	$response = $client->send_request($request);

	echo "client received response: ".PHP_EOL;
#	print_r($response);

	if ($response==1){
		echo("RESPONSE WORKED");

		include('config.php');
		$query = "SELECT * FROM loginform WHERE username = '$un' ";#
		($t = mysqli_query($db,$query) ) or die(mysqli_error($db) );

		$r = mysqli_fetch_array ($t, MYSQLI_ASSOC);

		$id = $r["sessionID"]; #grabs the mysql sessionId from user

	#	$_SESSION["ID"] = $id;


		#$_SESSION["sessionId"] = 'random';
		$_SESSION["sessionId"] = $r["sessionID"]; #this is the session used in validate which is sent to RabbitMQSERver 
		header("Location: mainpage.php");
	}
	else{
		echo("WRONG RESPONSE");
		$_SESSION["wrong"] = 'true';
		header("Location: index.php");
	}
//}

}

if(isset($_SESSION["register"])){
	$request = array();
	$request['type'] = "register";

	$request['username'] = $_POST['username'];

	$request['password'] = $_POST['password'];

	$request['message'] = $msg;
	$response = $client->send_request($request);

#	print_r($response);

	if ($response ==1){
		$_SESSION["registerPrompt"] ='true';
                header("Location: index.php");
        }

	header("Location: index.php");


	#echo "client received response: ".PHP_EOL;
	
	
	
}


if(isset($_SESSION["validate"])){
	$request = array();
	$request['type'] = "validate_session";
	$request['sessionId'] = $_SESSION["sessionId"] ;

	$response = $client->send_request($request);
	#echo "client received response: ".PHP_EOL;
#	print_r($response);

	if ($response !=1)
	{
		header("Location: index.php");
	}
	
	

}


if(isset($_SESSION["logs"])){
        $request = array();
        $request['type'] = "get_logs";

	#$request['test'] = 'test' ;


        $response = $client->send_request($request);
        echo "client received response: ".PHP_EOL;
        print_r($response);

        #if ($response ==1)
        #{
        #        echo "WORKOKINGINGINGIN";
        #}



}

if(isset($_SESSION["api"])){
        $request = array();
        $request['type'] = "get_api";

        $request['name'] = $_SESSION["apiName"] ;


        $response = $client->send_request($request);
        #echo "client received response: ".PHP_EOL;
       # print_r($response);

        #if ($response ==1)
        #{
        #        echo "WORKOKINGINGINGIN";
        #}



}



//if(isset($_SESSION["index"])){

	

//	$response = $client->send_request($request);
	
//	echo "client received response: ".PHP_EOL;
	
	
//	print_r($response);
	
//	if ($response == 1){
//		echo("<br>RESPONSE WORKED, Authentication Successfull<br>");
//		header("Location: welcome.php");
	
//	}
//	else{
//		echo("WRONG RESPONSE, Authentication Failure");
//		$_SESSION["wrong"] = 'true';
//		header("Location: index.php");
//	}

//}


//if(isset($_SESSION["register"])){
	
//	$response = $client->send_request($request);

//	echo "client received response: ".PHP_EOL;

//	print_r($response);
	
//	if ($response ==1){
//		header("Location: test.php");
//	}
//	else
//	{
//		header("Location: index.php");
//	}

//}


#echo "\n\n";

#echo $argv[0]." END".PHP_EOL;

