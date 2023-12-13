<?php
    include 'connection.php';

if ($_POST) {
  $title = $_POST['title'];
  $start = $_POST['start'];
  $end = $_POST['end'];

  // Insert the event into the database
  // Example: INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')
  $query = "INSERT INTO events (title, start, end) VALUES ('$title', '$start', '$end')";
  mysqli_query($conn, $query);
}
?>
