<?php
include "conn.php";

$productID = $_POST['id'];


$sql = "DELETE FROM products WHERE id_product=$productID";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => 1);
} else {
    $response = array("success" => 0, "error" => $conn->error);
}

$conn->close();

echo json_encode($response);
?>