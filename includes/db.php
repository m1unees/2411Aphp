<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'furnitureshopping';

$conn= new sqli(host : $home ,usernmae : $username ,password : $password ,database : $database);
if($conn->connect_error){
    echo("connection failed" . $conn->connect_error);
}

?>