<?php

require_once "conn.php";

$sql = "SELECT * FROM products";
$query = mysqli_query($conn, $sql);

$data = array();

while($row = mysqli_fetch_assoc($query)){
    $data[] = array("product" => $row["product_name"], "desc" => $row["product_desc"], "quantity" => $row["product_qty"], "price" => $row["product_price"],"status" => $row["active"], "id" => $row["id_product"], "img" => $row["product_img"],);
}



$response["data"] = $data;
echo json_encode($response);

?>