<?php
include("connection.php");
$id="";

// Fetch patient details from the database
$id = $_GET['updateid']; // You can use POST or any other method to get patient_id
$sql = "SELECT name, position, illness FROM add_patient WHERE id = $id";
$result = $conn->query( $sql );

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $patient_name = $row['name'];
        $pos = $row['position'];
        $diagnosis = $row['illness'];
        //$doctor_name = $row['doctor_name'];
    }

    // Generate the medical certificate
    $certificate_content = "
        <h2>Medical Certificate</h2>
        <p>This is to certify that $patient_name, $pos of Bulacan State University - Sarmiento Campus, has been diagnosed with $diagnosis.</p>
        <p>Issued by: Name ng nurse</p>
    ";

    // Output the certificate
    echo $certificate_content;
} else {
    echo "Patient not found.";
}

// Close the connection
$conn->close();
?>
