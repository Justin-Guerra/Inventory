<?php

$db_host = "sql201.infinityfree.com";
$db_user = "if0_36343879";
$db_pass = "HC5nhSaGTOv";
$db_name = "if0_36343879_inventory";

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
