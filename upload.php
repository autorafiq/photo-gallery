<?php include './db.php'; 
//create db obj
$db = new  DB();
//cheek the method
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $title = $_POST['title'];
    $image = $_FILES['image'];

    if(isset($image) && $image['tmp_name'] !==""){
       $uploadDir = 'uploads/';
       $filePath = $uploadDir . basename($image['name']);
       if(move_uploaded_file($image['tmp_name'],$filePath)){
         $db->getConnection()->query("INSERT INTO photos(title, image_path)VALUES('$title','$filePath')");
         header('Location: index.php');
       }
    }

}
exit;
?>