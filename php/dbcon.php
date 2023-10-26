<?php
$conn = new mysqli('localhost','root','','hotel');
if ($conn->connect_error) {
    die('Error : ('. $conn->connect_errno .') '. $conn->connect_error);
}
?>