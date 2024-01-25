<?php

include('connectin.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$gender = $_POST['gender'];
$age = $_POST['age'];

$conn = mysqli_connect('localhost', 'root', '', 'php_crud') or die(mysqli_error($conn));

$query = "INSERT INTO students 
(first_name,last_name,gender,age)
VALUES('{$first_name}','{$last_name}','{$gender}','{$age}')";


if (mysqli_query($conn, $query)) {
    echo "1";

} else {
    echo "0";
}

mysqli_close($conn);
?>