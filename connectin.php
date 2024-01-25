<?php
if ($conn = mysqli_connect('localhost', 'root', '', 'php_crud')) {
    //do something
} else {
    throw new Exception('Unable to connect');
}
?>