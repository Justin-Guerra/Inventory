<?php
require_once "conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $productID = $_GET['id'];

    
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['file']['name']; 

        
        $uploadDir = "../img/upload/";

        
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $image)) {
            
            $sql = "UPDATE products SET product_img = '$image' WHERE id_product = $productID";

            if (mysqli_query($conn, $sql)) {
                $response["success"] = 1;
            } else {
                $response["success"] = 0;
                $response["error"] = mysqli_error($conn);
            }
        } else {
            $response["success"] = 0;
            $response["error"] = "Failed to move the uploaded file.";
        }
    } else {
        $response["success"] = 0;
        $response["error"] = "No file was uploaded or an error occurred during upload.";
    }
} else {
    $response["success"] = 0;
    $response["error"] = "Invalid request method.";
}

echo json_encode($response);
?>
