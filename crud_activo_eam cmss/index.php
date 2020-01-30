<?php include("db.php") ?>
<?php include("includes/header.php") ?>


<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION["message"])) { ?>

                <div class="alert alert-<?=$_SESSION["message_type"]?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php session_unset(); } ?>


            <div class="card card-body">

                <form action="create_task.php" method="post">

                    <div class="form-group">
                        <input type="text" name="tittle" class="form-control" placeholder="Task tittle" autofocus>
                    </div>

                    <div class="form-group">

                        <textarea name="description" class="form-control" rows="2" placeholder="Description tittle" autofocus></textarea>
                    </div>

                    <input type="submit" value="Send" class="btn btn-success btn-block" name="send_t">


                </form>

            </div>

        </div>

        <div class="col-md-8">


                <table class="table table-striped">

                <thead>

                    <tr>
                        <th id="column-a">Tittle</th>
                        <th id="column-b">Description</th>
                        <th id="column-c">Created at</th>
                        <th>Actions</th>

                    </tr>
                    

                </thead>

                <tbody>


                <?php
                    $query="SELECT * FROM task";
                    $result_task = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_task)){ ?>
                          
                        <tr>
                            <td> <?php echo $row['tittle'] ?> </td>
                            <td> <?php echo $row['description'] ?> </td>
                            <td> <?php echo $row['created_at'] ?> </td>
                            
                            <td>
                                 <a class="btn btn-secondary" href="update_task.php?id=<?php echo $row['id'] ?>">Edit</a> 
                                <a class="btn btn-danger" href="delete_task.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>


                </table>

                <table>
                    <tbody>
                        <tr>
                        <button class="btn btn-link" type="button" data-column="#column-a">Hide/show Tittle</button>
                        <button class="btn btn-link" type="button" data-column="#column-b">Hide/show Description</button>
                        <button class="btn btn-link" type="button" data-column="#column-c">Hide/show Created at</button>
                            
                        </tr>
                    </tbody>
                </table>

        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>