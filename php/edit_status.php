<?php
include "conn.php";

$productID = $_POST['id'];
$newStatus = $_POST['status'];

$sql = "UPDATE products SET active = $newStatus WHERE id_product = $productID";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => 1);
} else {
    $response = array("success" => 0, "error" => $conn->error);
}

$conn->close();

echo json_encode($response);
?>