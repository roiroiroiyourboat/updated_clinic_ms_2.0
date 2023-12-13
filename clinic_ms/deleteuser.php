<?php
    include 'connection.php';
    if(isset($_GET['deleteuser'])){
        $id=$_GET['deleteuser'];

        $sql="delete from users where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
           echo "<script> if (confirm('Are you sure you want to delete this?')) {
            window.location.href = 'users.php';}</script>";
           //header('location:patients.php');
        }else{
            die(mysqli_error($conn));
        }
    } 
?>
