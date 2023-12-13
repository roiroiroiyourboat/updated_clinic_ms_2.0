
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="users.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://unpkg.com/css.gg/icons/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
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

    <!--header-->
    <section class="main">
        <nav>
            <div class="side">
                <i class='bx bx-user'></i>
                <span class="users">Users</span>
            </div>
            
            <form action="" method="get">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search..." class="input_search" required>
                    <button type="submit" name="btnSearch"><i class='bx bx-search' ></i></button>
                </div>
            </form>
        </nav>

        <div class="box2">
            <!--add users
            <button class="btn_form" onclick="openForm()">
                <i class='bx bx-plus'></i>
                <span>Add Users</span>
            </button>

            <div class="form_popup" id="myForm">
                <form action="user_config.php" method="post"  class="form-container" id="form_id">
                    <h2>Add Users</h2> 
                    <button type="button" class="btncancel" onclick="closeForm()"><i class="gg-close form-close"></i></button>

                    <div class="row">
                        <div class="col">
                            <label for="form-label">First Name:</label>
                            <input type="text" class="form-control" id="input" name="firstname" placeholder="Enter first name" autocomplete="off" required>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="input" name="lastname" placeholder="Enter last name" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Email:</label>
                            <input type="text" class="form-control" id="input" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    
                    <div class="input_box">
                        <button type="submit" class="btnSubmit" name="btnSubmit">Submit</button>
                    </div>
                    <div class="input_box">
                        <button type="button" class="btnClear" onclick="clearForm()">Clear</button>  
                    </div>
                    </form>
            </div>-->
        </div>

         <!--get data from database-->
            <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">

                <?php
                    include ("connection.php"); 
                     if(isset($_GET["search"])) {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM users WHERE CONCAT(fname, lname) LIKE '%$filtervalues%'";

                        $result = $conn-> query($query);
                        if(!$result){
                            die("Invalid query: ".$conn->error);
                        }
                        //read data
                        if($row = $result-> fetch_assoc()){
                            $id=$row['id'];
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $email=$row['email'];
                            $date=$row['date'];

                            echo "<tr>
                            <td>$id</td>
                            <td>$fname</td>
                            <td>$lname</td>
                            <td>$email</td>
                            <td>$date</td>
                            
                            <td>
                                <a class='btn btn-primary btn-sm' href='viewuser.php?updateid=$id'><i class='bi bi-eye'></i></a>
                            </td>
                            </tr>";
                        } else {
                            ?>
                                <tr>    
                                    <td colspan="5">No record found.</td>
                                </tr>
                            <?php
                        }

                } else {
                    $sql = "SELECT * FROM users;";
                    $result = $conn-> query($sql);
                    if(!$result){
                        die("Invalid query: ".$conn->error);
                    }
                    //read data
                    while($row = $result-> fetch_assoc()){
                        $id=$row['id'];
                            $fname=$row['fname'];
                            $lname=$row['lname'];
                            $email=$row['email'];
                            $date=$row['date'];

                            echo "<tr>
                            <td>$id</td>
                            <td>$fname</td>
                            <td>$lname</td>
                            <td>$email</td>
                            <td>$date</td>
                        
                        <td>
                            <a class='btn btn-primary btn-sm' href='viewuser.php?updateid=$id'><i class='bi bi-eye'></i></a>
                        </td>
                        </tr>";
                    }
                } 
               
            ?>    
            </tbody>
        </table>   
    </section>
    
    <script>

         function openForm() {
            document.getElementById("myForm").style.display = "block";}

        function closeForm() {
            document.getElementById("myForm").style.display = "none";}

        function clearForm(){
            var element = document.getElementById("form_id");
            element.reset();
        } 

        function log_out(){
            var txt;
            if(confirm("Are you sure you want to log out?")){
                var a = document.getElementById("go");
                a.href="log_in.php";
            }
        }
    </script>
</body>
</html>