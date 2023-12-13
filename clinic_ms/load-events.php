<?php
    include 'connection.php';

$events = array();

$query = "SELECT id, title, start, end FROM events";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $events[] = $row;
}

echo json_encode($events);
?>
