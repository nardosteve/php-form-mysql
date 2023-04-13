<?php

$servername = "localhost";
$username = "root";
$password = "";

//creating a connection
$conn = new mysqli($servername, $username, $password);

//Check connection
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    echo "Connected successfully";
}

//Create database
$sqlCommand = "CREATE DATABASE my_form";

//Check Query
if($conn->query($sqlCommand) === TRUE){
    echo "Database Created!";
}else{
    echo "ERROR Creating Database: " .$conn->error;
}

$conn->close();

?>