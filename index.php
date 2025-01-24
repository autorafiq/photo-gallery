<?php include_once './db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Photo Gallery App </title>
        <?php include './css.php'; ?>
    </head>  
<body>

    <div class="container">
        <!-- Beginning of Photo Uploading Section -->
        <h1>Photo Gallery</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name ="title" placeholder="Enter the photo title here..." required>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Upload</button>
        </form>
        <!-- End of Photo Uploading Section -->
        <hr>
        <!-- Beginning of Gallery Display Section -->
        <div>
            <!-- Photo Details -->
            <?php 
            $db = new  DB();
            $conn = $db->getConnection();
            $result = $conn->query("SELECT * FROM photos ORDER BY created_at DESC");
            if($result->num_rows > 0):
                while($row = $result->fetch_assoc()):        
            ?>
            
            <div>
                <!-- Display file titles and thumbnails for images -->
                <h2><?php echo $row['title']; ?></h2>
                <img src="<?php echo $row['image_path']; ?>" alt="image" width="300px">
                
                <form action="delete.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </div>
            <?php endwhile;
            else:
                echo "No photos uploaded yet";
            endif;
            ?>
            
        </div>
         <!-- End of Gallery Display Section -->
          
    </div>

</body>
</html> 