<?php
include('connectin.php');


$query = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $query) or die(mysqli_error($error));

// Convert the result to an associative array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Send the data as JSON response
header('Content-Type: application/json');
echo json_encode(['data' => $data]);

mysqli_close($conn);


?>