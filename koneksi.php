<?php
    $host = 'localhost' ;
    $user = 'root';
    $pass = '';
    $db = 'db_sekolah' ;
    $conn = mysqli_connect($host, $user, $pass, $db);
    if($conn){
        //echo "konesksi berhasi";
    }

    mysqli_select_db($conn, $db);
?>