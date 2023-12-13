<?php
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

        //database connection
        $conn = new mysqli('localhost', 'root','','clinic_ms');
        //check connection
        if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
        } else{
            $stmt = $conn->prepare("insert into add_patient(student_id, name, position, course, age, sex, illness, temp, weight, height, bp)
            values(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssissssss", $stud_id, $name, $position, $course, $age, $sex, $ill, $temp, $weight, $height, $bp);
            $stmt->execute();
            header('location: patients.php');
            $stmt->close();
            $conn->close();
        }

?>
