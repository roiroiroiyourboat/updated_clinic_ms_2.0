<?php 
    include 'connection.php';
    //$id=$_GET['updateid'];
    $id="";
    $stud_id="";
    $name="";
    $position="";
    $course="";
    $age="";
    $sex="";
    $ill="";
    $temp="";
    $weight="";
    $height="";
    $bp="";


    if($_SERVER['REQUEST_METHOD']=='GET'){
        //$id=$_GET['updateid']; //get method shows the data of the client
        if(isset($_GET['id'])) {
            header('location:patients.php');
            exit;
        }
        $id=$_GET['updateid'];
        //read the row
        $sql = "SELECT * FROM add_patient WHERE id=$id";
        $result = mysqli_query($conn, $sql);

        $row = $result->fetch_assoc();

        if(!$row){
            header('location:patients.php');
            exit;
        }

        $stud_id=$row['student_id'];
        $name=$row['name'];
        $position=$row['position'];
        $course=$row['course'];
        $age=$row['age'];
        $sex=$row['sex'];
        $ill=$row['illness'];
        $temp=$row['temp'];
        $weight=$row['weight'];
        $height=$row['height'];
        $bp=$row['bp'];

    } else {
        //post method
        $id = $_POST['id'];
        $stud_id = $_POST['stud_id'];
        $name = $_POST['name'];
        $position = $_POST['pos'];
        $course = $_POST['course'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $ill = $_POST['ill'];
        $temp = $_POST['temp'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bp = $_POST['bp'];

        do{
            if(empty($id) || empty($stud_id) || empty($name) || empty($position) || empty($course) || empty($age) || empty($sex) || empty($temp) ||
             empty($ill) || empty($weight) || empty($height) || empty($bp)) {
                echo "all the fields are required";
             }
                    $sql="update add_patient set id='$id', student_id='$stud_id', name='$name', position='$position', course='$course', age='$age', sex='$sex', 
                    illness='$ill', temp='$temp', weight='$weight', height='$height', bp='$bp' where id=$id";
                    $result=mysqli_query($conn,$sql);
                if(!$result){
                    die("Invalid query: ".$conn->error);
                }

            header('location:patients.php');
        }while(true);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient</title>
    <link rel="stylesheet" href="viewpatient.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <div class ="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px">
            <h2 class="text-center">View and update patient information</h2> <br>
            <input type="hidden" name="id" value="<?php echo $id;?>">
                <div class="row">
                    <div class="col">
                        <label for="form-label">Employee/Student No:</label>
                        <input type="text" class="form-control" name="stud_id" value="<?php echo $stud_id;?>">
                    </div>

                    <div class="col">
                        <label for="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                    </div>  
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="form-label">Position:</label>
                        <input type="text" class="form-control" name="pos" value="<?php echo $position;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Program:</label>
                        <input type="text" class="form-control" name="course" value="<?php echo $course;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Age:</label>
                        <input type="number" class="form-control" name="age" value="<?php echo $age;?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="form-label" class="formlabel">Sex:</label> &nbsp;
                        <input type="radio" class="form-check-input" name="sex" id="male" <?php if ($row['sex']=='male'){echo 'checked'; }?> value="Male">
                        <label for="male" class="form-input-label">Male</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="sex" id="female" <?php if ($row['sex']=='female') {echo 'checked'; } ?> value="Female">
                        <label for="female" class="form-input-label">Female</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="form-label">Illness:</label>
                        <input type="text" class="form-control" name="ill" value="<?php echo $ill;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Temperature:</label>
                        <input type="text" class="form-control" name="temp" value="<?php echo $temp;?>"> 
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="form-label">Weight:</label>
                        <input type="text" class="form-control" name="weight" value="<?php echo $weight;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Height:</label>
                        <input type="text" class="form-control" name="height" value="<?php echo $height;?>">
                    </div>
                    <div class="col">
                        <label for="form-label">Blood Pressure:</label>
                        <input type="text" class="form-control" name="bp" value="<?php echo $bp;?>">
                    </div>
                </div>
                <br>
                <div class="btn">
                    <button type="button" class="btn btn-primary"><a href="generate_medical_cert.php?updateid=$id" style="text-decoration: none; color:white">Print</a></button>
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="cancel" class="btn btn-danger">Cancel</button> 
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>