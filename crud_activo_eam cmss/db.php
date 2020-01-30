<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'db_activo_eam_cmss'
    );

    /*if (isset($conn)){
        echo("db ok");
    }
    */