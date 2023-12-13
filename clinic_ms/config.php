<?php 

    $conn = new mysqli('localhost', 'root','','clinic_ms');
    if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
    }
    if(isset($_POST['signup']))
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $checkuser="SELECT * from users where email='$email'";
    $result = mysqli_query($conn, $checkuser);
    $count = mysqli_num_rows($result);
    if($count>0){
        echo "<script>alert('This email is already exist.') 
        window.location.href = 'register.php'</script>";
        }else if ($password == $cpassword){
            /*$stmt = $conn->prepare("insert into users(Username, Email, Password)
            values(?,?,?)");
            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            echo "<script>alert('Registration successfully')
                
            </script>";
            $stmt->close();
            $conn->close();*/
           $sql = "insert into users(fname, lname, email, password) values ('$fname','$lname', '$email','$password')";
                if($conn->query($sql)){
                    header('location:log_in.php');
                }
        }else{
            echo "<script>alert('Password does not match')</script>";
        } 
?>