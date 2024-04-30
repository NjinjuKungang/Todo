<?php
    include('database.php');


    // Deleting an activity
    if(isset($_POST['delete'])){

        $result = mysqli_query($conn, "select id from activity");
        if($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $sql = "DELETE FROM activity WHERE id='$id' ";

        mysqli_query($conn, $sql);
        }
    }

    if(isset($_POST['complete'])){
        $result = mysqli_query($conn, "select * from activity");
        if($row = mysqli_fetch_assoc($result)) {

        $id = $row['id'];
        $sql = "UPDATE activity SET date=CURRENT_TIMESTAMP WHERE id='$id' ";
            
        mysqli_query($conn, $sql);
        
    
    }}
                        
    // $result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" 
          method="post" enctype="multipart/form-data">
        <h2>Welcome to <i>my Todo List!!!</i></h2>
        <div>
            <h3>Todo List</h3>
            <hr>
            <div>
                <?php
                    $result = mysqli_query($conn, "select * from activity");
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['date'] === null){
                ?>
                    <img src="uploads/<?php echo $row['image'] ?>" style="width: 200px;" />
                    <h3><?php echo $row['title']; ?></h3>
                    <h4><?php echo $row['description']; ?></h4>
                    
                    <button><a href="edit.php">Edit</a></button>
                    <button type="submit" name="complete">Completed</button>
                    <button type="submit" name="delete" >Delete</button><hr>
                <?php } } ?>
            </div>
            <button><a href="create.php">Create</a></button><br>
            

        </div>
        <div>
            <h3>Done List</h3><hr>
            <div>
                <?php
                    $result = mysqli_query($conn, "select * from activity");
                    while($row = mysqli_fetch_assoc($result)) {
                        if($row['date'] !== null){
                ?>
                    <img src="uploads/<?php echo $row['image'] ?>" style="width: 200px;" />
                    <h3><?php echo $row['title']; ?></h3>
                    <h4><?php echo $row['description']; ?></h4>

                    <h6>Done on: <?php echo $row['date']; ?></h6>
                <?php }} ?>   
            </div>
        </div>

    
    </form>
</body>
</html>
<!-- <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> -->
