
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <!--Boxicons link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!--calendar-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    

</head>
<body>
        <!--<div class="sidebar">
            <div class="logo">
            <img src="BulSU-SC Logo.png" alt="BULSU-SC LOGO"> 
            <p class="logo_name">BULSU-SC CLINIC</p>
            </div>

            <ul class="nav-links">   
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="my_profile.php">
                    <i class='bx bx-user-circle'></i>
                    <span class="link_name">My Profile</span>
            </li> 
            <li>
                <a href="patients.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Patients</span>
                </a>
            </li>
            <li>
                <a href="users.php">
                    <i class='bx bx-group' ></i>
                    <span class="link_name">Users</span>
                </a>
            </li>
            <li>
                <a href="reports.php">
                    <i class='bx bx-spreadsheet'></i>
                    <span class="link_name">Reports</span>
                </a>
            </li> 
            <li>
            <div class="log_out">
                    <a id="go" onclick="log_out()">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name" id="logout">Log out</span></a>
                </div>
            </li>
            </ul>
            
        </div>-->

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
                <i class='bx bxs-dashboard'></i>
                <span class="dashboard">Dashboard</span>
            </div>
        </nav>
        <div class="box">
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card card-body p-3">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Patients</p>
                        <h5 class="font-weight-bolder mb-0">
                            <?php 
                                include 'connection.php';
                                $qry = "SELECT id FROM add_patient  ORDER BY id";
                                $qry_run = mysqli_query($conn,$qry);

                                $row = mysqli_num_rows($qry_run);

                                echo '<h1>'.$row.'</h2>';
                            ?>
                        </h5>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card card-body p-3">
                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
                        <h5 class="font-weight-bolder mb-0">
                            <?php
                                include 'connection.php';
                                $qry = "SELECT id FROM users  ORDER BY id";
                                $qry_run = mysqli_query($conn,$qry);

                                $row = mysqli_num_rows($qry_run);

                                echo '<h1>'.$row.'</h2>';
                            ?>
                        </h5>
                    </div>
                </div>
                
            </div>
            
                <form id="event-form">
                    <div class="row">
                        <div class="col">
                            <label for="form-label">Event Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="col">
                            <label for="form-label">Start Date and Time:</label>
                            <input type="datetime-local" class="form-control" id="start" name="start" required>
                        </div>
                        <div class="col">
                            <label for="form-label">End Date and Time:</label>
                            <input type="datetime-local" class="form-control" id="end" name="end" required>
                        </div>
                        <div class="col" style="margin-top:15px">
                            <button type="button" class="btn btn-primary" onclick="submitEvent()" style="width:10vw; height:3vw;">Add Event</button>
                        </div>
                            
                    </div>
                </form>
                <br>
                <div id="calendar"></div>  

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
        $(document).ready(function () {
           var calendar = $('#calendar').fullCalendar({
                editable:true,
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
                },
                events: 'load-events.php',
                selectable:true,
                selectHelper: true,
                });
            });

            function submitEvent() {
                    // Use AJAX to submit the form data to the PHP script for insertion
                    $.ajax({
                    type: 'POST',
                    url: 'insertevent.php', // PHP script to insert events into the database
                    data: $('#event-form').serialize(),
                    success: function (response) {
                        // Refresh the calendar to display the new event
                        $('#calendar').fullCalendar('refetchEvents');
                    }
                    });
            }

    </script>
</body>
</html>