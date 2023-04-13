<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_form";

//creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}else{
    echo "Connected successfully";
}

//Create tables
$sql = "CREATE TABLE userForm(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    emailAddress VARCHAR(30) NOT NULL,
    fullNames VARCHAR(60) NOT NULL,
    uploadImage VARCHAR(60) NOT NULL,
    country VARCHAR(30) NOT NULL,
    uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table Successfully Created!";
  } else {
    echo "Error creating table: " . $conn->error;
  }

//Create database
// $sqlCommand = "CREATE DATABASE my_form";

//Check Query
// if($conn->query($sqlCommand) === TRUE){
//     echo "Database Created!";
// }else{
//     echo "ERROR Creating Database: " .$conn->error;
// }

$conn->close();

?>