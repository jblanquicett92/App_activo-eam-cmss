<?php

include("db.php");
//echo '1';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //echo '2';
    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $tittle = $row['tittle'];
        $description = $row['description'];
    }

    /*$_SESSION['message']="Task deleted succesfully";
    $_SESSION['message_type']="danger";
    
    header("Location: index.php");
    */
}

if (isset($_POST['update'])){

    $id = $_GET['id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];
    
    $query = "UPDATE TASK SET tittle ='$tittle', description = '$description' where id='$id' ";
    $result = mysqli_query($conn, $query);
    
    $_SESSION['message']="Task update succesfully";
    $_SESSION['message_type']="secondary";
    header("Location: index.php");

    //print $tittle." ".$description;
}

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="update_task.php?id=<?php print $_GET['id']?>" method="POST">
                    <div class="form-group">  
                        <input type="text" name="tittle" value="<?php print $tittle ?>" class="form-control" placeholder="Update tittle">
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php print $description?></textarea>

                    </div>
                    <button class=" btn btn-success" type="submit" name="update">send</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>