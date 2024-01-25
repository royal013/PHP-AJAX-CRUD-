<?php
include('connectin.php');

$first_name = $_POST['first_name1'];
$last_name = $_POST['last_name1'];
$gender = $_POST['gender1'];
$age = $_POST['age1'];
$action = $_POST['action'];


$updateQuery = "UPDATE students SET first_name='{$first_name}', last_name='{$last_name}', gender='{$gender}', age='{$age}' WHERE id='{$action}'";

if(mysqli_query($conn,$updateQuery)){
    echo "1";
}
else{
    echo "0";
}

mysqli_close($conn);
?>