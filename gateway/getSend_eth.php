<?php

include(dirname(__DIR__).'/library/common.php'); //domain check
include(dirname(__DIR__).'/library/Requests.php'); //request for php class (개좋다 씨발 무조건 이거 써야게네)

Requests::register_autoloader(); //autoloader

////////////////////////
//server curl connection
//etherscan/api/account/txbalance
////////////////////////
$etheraddr = isset($_POST["myEthAddr"]) ? $_POST["myEthAddr"] : false;


$httpConfig = array(
    "url" => $apiHost.'/etherscan/api/account/txbalance', //url
    "headers" => array('Accept' => 'application/json'), //send header
    "data" => array('etheraddr'=>$etheraddr) //post send data
);

$response = Requests::post($httpConfig["url"], $httpConfig["headers"], $httpConfig["data"]);

header('Content-Type: application/json');
echo $response->body;
?>
