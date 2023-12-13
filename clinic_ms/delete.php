<?php
    include 'connection.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="delete from add_patient where id=$id";
        $result=mysqli_query($conn,$sql);
        if($result){
           echo "<script> if (confirm('Are you sure you want to delete this?')) {
            window.location.href = 'patients.php';} else{okay}</script>";
           //header('location:patients.php');
        }else{
            die(mysqli_error($conn));
        }
    } 
    
?>

