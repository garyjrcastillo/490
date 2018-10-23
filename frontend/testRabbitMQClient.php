#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
session_start();

#include("index.php");

$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}

$request = array();
$request['type'] = "login";
$request['username'] = $_POST['username'];
$request['password'] = $_POST['password'];
#$request['username'] = "test";
#$request['password'] = "test";
$request['message'] = $msg;
$response = $client->send_request($request);
//$response = $client->publish($request);

echo "client received response: ".PHP_EOL;
print_r($response);

if ($response == 1){
	echo("<br>RESPONSE WORKED, Authentication Successfull<br>");
	header("Location: welcome.php");
}
else{
	echo("WRONG RESPONSE, Authentication Failure");
	$_SESSION['wrong'] = 'true';
	header("Location: index.php");
	echo ("WRONG");
}

#echo "\n$msg";

echo "\n\n";

echo $argv[0]." END".PHP_EOL;

#header("Location: welucome.php");
