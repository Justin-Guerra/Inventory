<?php
include "conn.php";

$productID = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$sql = "UPDATE products SET product_name = '$name', product_desc= '$desc', product_qty= $qty, product_price= $price  WHERE id_product = $productID";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => 1);
} else {
    $response = array("success" => 0, "error" => $conn->error);
}

$conn->close();

echo json_encode($response);
?>