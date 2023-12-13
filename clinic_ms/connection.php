<?php

$conn = new mysqli('localhost', 'root','','clinic_ms');

    if(!$conn){
        die(mysqli_error($conn));
    }
    //echo "connected";

?>