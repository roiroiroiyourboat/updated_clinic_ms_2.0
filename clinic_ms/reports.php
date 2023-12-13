<!DOCTYPE html>
<html>
<head>
    <title>Reports</title>
    <link rel="stylesheet" href="reports.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    
    <!--header title-->
    <section class="main">
        <nav>
            <div class="side">
                <i class='bx bxs-report'></i>
                <span class="reports">Reports</span>
            </div>
        </nav>

        <div class="box2">
            <a href="print.php">
                <button class="btn_print">
                    <i class='bx bx-printer'></i>
                    <span>Print</span>
                </button>
            </a>
        </div>       

        <!--get data from database-->
        <table class="table table-primary ">
            <thead class="table align-middle">
                <tr class="table-secondary">
                    <th>Illness/Disease</th>
                    <th>Date</th>

                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php
                    $conn = new mysqli('localhost', 'root','','clinic_ms');
                    //check connection
                    if($conn->connect_error){
                                die('Connection Failed : '.$conn->connect_error);
                            } 
                            $sql = "SELECT illness, date FROM add_patient;";
                            $result = $conn-> query($sql);
                            if(!$result){
                                die("Invalid query: ".$conn->error);
                            }
                            //read data
                            while($row = $result-> fetch_assoc()){
                                echo "<tr>
                                <td>$row[illness]</td>
                                <td>$row[date]</td>
                                </tr>";
                            }
                        ?> 
            </tbody>
            
    </section>
    
    <script>
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