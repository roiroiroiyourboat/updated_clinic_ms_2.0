<?php 
    include 'connection.php';
    //$id=$_GET['updateid'];
    $id="";
    $firstname="";
    $lastname="";
    $email="";
    if($_SERVER['REQUEST_METHOD']=='GET'){
        //$id=$_GET['updateid']; //get method shows the data of the client
        if(isset($_GET['id'])) {
            header('location:users.php');
            exit;
        }
        $id=$_GET['updateid'];
        //read the row
        $sql = "SELECT * FROM users WHERE id=$id";
        $result = $conn->query( $sql );
        $row = $result->fetch_assoc();

        if(!$row){
            header('location:users.php');
            exit;
        }

        $firstname=$row['fname'];
        $lastname=$row['lname'];
        $email=$row['email'];
        
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="viewuser.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class ="container d-flex justify-content-center">
            <form action="" method="post" style="width:25vw; min-width:200px;">
            <h1 class="text-center" style="font-weight:600;">View Users</h1> <br>
            <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="row">
                    <div class="col">
                        <label for="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname;?>" aria-label="Disabled input example" disabled>
                    </div> 
                </div>
                <br>
                <div class="col">
                        <label for="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname;?>" aria-label="Disabled input example" disabled>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="form-label">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $email;?>" aria-label="Disabled input example" disabled>
                    </div>
                </div>
                <!--<div class="btn" style="margin-top: 5px;">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="cancel" class="btn btn-danger">Cancel</button>
                </div>-->
                </form>
            </div>     
    </div>
</body>
</html>