<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "products";

//ARRAY USED TO RETURN RESPONSE TO FRONTEND
$response = array();

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn -> connect_errno) {
    $response["server_conn"] = 0;
    $response["message"] = "Failed to connect to MySQL: " . $mysqli -> connect_error;
  echo json_encode($response);
  exit();
}

?>