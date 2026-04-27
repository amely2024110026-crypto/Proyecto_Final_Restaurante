<?php
$conn = new mysqli("localhost","root","","restaurante");

if($conn->connect_error){
    die("Error: ".$conn->connect_error);
}
?>