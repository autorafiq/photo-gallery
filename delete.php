<?php
include_once './db.php'; 
//create db obj
$db = new  DB();
//call the function to get connection
$conn = $db->getConnection();
//cheek the method
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = intval($_POST['user_id']);
    // Getting the image from DB by ID
    $result = $conn->query("SELECT image_path FROM photos WHERE id = $id");

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        // Delete from the folder
        unlink($row['image_path']);
    }
    // Delete from DB
    $conn->query("DELETE FROM photos WHERE id = $id"); 
     // Redirect to the index.php
    header('Location: index.php');
    exit;
}

?>