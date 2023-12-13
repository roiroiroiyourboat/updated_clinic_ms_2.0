<?php 
    include 'connection.php';
    //$id=$_GET['updateid'];
    $id="";
    $email="";
    $password="";
    $fname="";
    $lname="";


    if($_SERVER['REQUEST_METHOD']=='GET'){
       //$id=$_GET['']; //get method shows the data of the client
        if(isset($_GET['id'])) {
            header('location:log_in.php');
            exit;
        }
       
        //read the row
        $sql= "select* FROM users";
        $result = $conn->query( $sql );
        $row = $result->fetch_assoc();

        if(!$row){
            header('location:log_in.php');
            exit;
        }
        $email=$row['email'];
        $password=$row['password'];
        $fname=$row['fname'];
        $lname=$row['lname'];
      
       

    } else {
        //post method
        $email = $_POST['email'];
        $password= $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

       

        do{
            if(empty($id) || empty($fname) || empty($lname) || empty($email) || empty($password) || empty($pp)) {
                echo "all the fields are required";
             }
                    $sql="update users set id='$id', fname='$fname', lname='$lname', email='$email', password='$password' ,where id=$id";
                    $result=mysqli_query($conn,$sql);
                if(!$result){
                    die("Invalid query: ".$conn->error);
                }

            header('location:patients.php');
        }while(true);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="my_profile.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
</head>
<body>
    <div class="sidebar">
            <div class="logo-details">
                <img src="BulSU-SC Logo.png" alt="BULSU-SC LOGO"> 
                <div class="logo_name">BULSU-SC Clinic</div>
            </div>
            <ul class="nav-list">
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="my_profile.php">
                        <i class='bx bx-user-circle'></i>
                        <span class="links_name">My Profile</span>
            </li>
            <li>
                <a href="patients.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Patients</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bx-group' ></i>
                    <span class="links_name">Users</span>
                </a>
            </li>
            <li>
                <a href="reports.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="links_name">Reports</span>
                </a>
            </li>
            
            <li>
                 <div class="log_out">
                    <a id="go" onclick="log_out()">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name" id="logout">Log out</span></a>
                </div>
            </li>
            </ul>
        </div>

        <section class="main">
        <nav>
            <div class="side">
                    <i class='bx bx-user-circle'></i>
                    <span class="my_profile">My Profile</span>
                </div>
            </nav>

            <div class="d-flex justify-content-center align-items-center b-1">
<!----
  <div class="shadow  text-center bx-3">
            <img src="icon/monkey.png">
    	    <label for="input-file">Update Image</label>
            <input type="file" accept="image/jpeg, image/png, img/jpg" id ="input-file">
    		
            <h1 class="display-6 "><?=$row['fname']?></h1>
             <h1 class="display-6 "><?=$row['lname']?></h1>
            
            
             <a href="log_in.php" class="btn btn-warning">
                Logout
            </a>
		</div>---->
    	
    	<form class="shadow w-450 p-3" 
    	      action="" 
    	      method="post"
    	      enctype="multipart/form-data">

              <input type="hidden" name="id" value="<?php echo $id;?>">

		
		  <div class="mb-2">
		    <label class="form-label">First Name</label>
            <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
		  </div>

		  <div class="mb-2">
		    <label class="form-label">Last Name</label>
            <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>"> 
		  </div>

		  <div class="mb-2">
		    <label class="form-label">Email</label>
		    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
		  </div>

          <div class="mb-2">
		    <label class="form-label">Password</label>
		    <input type="password" class="form-control" name="password" value="<?php echo $password;?>">
		  </div>

          <div class="mb-2">
		    <label class="form-label">Profile Picture</label>
		    <input type="file"  class="form-control" name="pp">
		  </div>
		  
		  <button type="update" class="btn btn-primary">Update</button>
		  <!--<a href="log_in.php" class="link-secondary">Logout</a>-->
		</form>
    </div>


        </section>
    
    <script>
        function log_out(){
            var txt;
            if(confirm("Are you sure you want to log out?")){
                var a = document.getElementById("go");
                a.href="log_in.php";
            }
        }

        let profilePic =  document.getElementById("profile-pic");
        let inputFile = document.getElementById("input-file");

        inputFIle.onchange=function(){
            profilePic.src = URL.createObjectURL(inputFIle.files[0]);
        }

    </script>
</body>
</html>