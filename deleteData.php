<?php
include 'connectin.php';
$id = $_POST['id'];


if (isset($id)) {


    $query = " DELETE FROM students WHERE id = $id";

    if (mysqli_query($conn, $query)) {

        echo "1";

    } else {

        echo "0";
    }
    // $result = mysqli_query($conn, $query) or die(mysqli_error($error));

    mysqli_close($conn);
}



?>