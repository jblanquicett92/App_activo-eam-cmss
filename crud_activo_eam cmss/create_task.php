<?php
include("db.php");

if (isset($_POST['send_t'])) {

    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    $query = " INSERT INTO TASK (tittle, description) VALUES ('$tittle', '$description')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Fail");
    }

    $_SESSION['message']="Task saved succesfully";
    $_SESSION['message_type']="success";

    header("Location: index.php");
}
