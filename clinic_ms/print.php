<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>
<body style="margin: 10px;">
    <!--header title-->
    <section class="main">
        <nav>
            <div class="side">
                <p class="reports">Reports of Modality</p>
            </div>
        </nav>
        <div class="box2">
                <button onclick="window.print();" class="btn_print" id="print-btn">
                    <i class='bx bx-printer'></i>
                    <span>Print</span>
                </button>
        </div>
        

        <!--get data from database-->
        <table class="table table-primary ">
            <thead>
                <tr class="table-secondary">
                    <th>Illness/Disease</th>
                    <th>Date</th>
                </tr>
            </thead class="table-group-divider">
            <tbody>

            
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
</body>
</html>