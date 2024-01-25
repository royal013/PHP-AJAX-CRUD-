<?php
include 'connectin.php';

$id = $_POST['id'];

if (isset($id)) {


    $query = "SELECT * FROM students WHERE id= $id LIMIT 1";
    $result = mysqli_query($conn, $query) or die(mysqli_error($error));




    if (mysqli_num_rows($result) > 0) {

        $data = array();

        $row = mysqli_fetch_assoc($result);
        $data['firstname'] = $row['first_name'];
        $data['lastname'] = $row['last_name'];
        $data['gender'] = $row['gender'];
        $data['age'] = $row['age'];

        print_r(json_encode($data));

    }


    mysqli_close($conn);
}




?>