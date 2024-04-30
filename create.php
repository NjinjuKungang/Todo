<?php
    include('database.php');

    $msg = "";

    if(isset($_POST['upload'])){

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];

        $folder = "uploads/{$filename}";

        $sql = "INSERT INTO activity (title, description, image)
             VALUES ('$title', '$description', '$filename')";
        mysqli_query($conn, $sql);

        if(move_uploaded_file($tempname, $folder)){
            $msg = "Activity uploaded successfully";
            echo $msg;
        }
        else{
            $msg = "Failed to upload activity";
            echo $msg;
        }
        header($Location="index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Add a new item on the list</h3>
        <hr>
        <h4>Title</h4>
        <textarea rows="2" cols="50" name="title"></textarea>
        <h4>Description</h4>
        <textarea rows="5" cols="50" name="description"></textarea><br><br>
        <input type="file" name="image"><br>
        <div>
            <img src="" alt="">
        </div><br><br>
        <button type="submit" name="upload">Upload</button>
        <!-- <a href="index.php"><input type="submit" name="submit" value="Create"></a> -->
    </form>
</body>
</html>

