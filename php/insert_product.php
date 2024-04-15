<?php

require_once "conn.php";

$product = $_POST["product"];
$desc = $_POST["desc"];
$quant = $_POST["quantity"];
$price = $_POST["price"];
$sql = "INSERT INTO products (product_name,product_desc,product_qty,product_price) VALUES ('$product','$desc','$quant','$price')";
if(mysqli_query($conn, $sql)){
    $response["success"] = 1;
}else{
    $response["success"] = 0;
}

echo json_encode($response);

?>