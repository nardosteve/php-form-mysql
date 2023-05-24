<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_data";

//creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}else{
//     echo '
//     <div class="container mt-5">
//         <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
//             Connected Successfuly
//             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//         </div>
//     </div>
//   ';
}

//Create database
// $sqlCommand = "CREATE DATABASE user_data";

//Check Query
// if($conn->query($sqlCommand) === TRUE){
//     echo "Database Created!";
// }else{
//     echo "ERROR Creating Database: " .$conn->error;
// }

//Create tables
// $sql = "CREATE TABLE userRecords(
//     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     emailAddress VARCHAR(30) NOT NULL,
//     fullNames VARCHAR(60) NOT NULL,
//     uploadImage VARCHAR(60) NOT NULL,
//     country VARCHAR(30) NOT NULL,
//     uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";

// if ($conn->query($sql) === TRUE) {
//     echo "Table Successfully Created!";
//   } else {
//     echo "Error creating table: " . $conn->error;
//   }

// $sql = "
// INSERT INTO userform (emailAddress, fullNames, uploadImage, country)
// VALUES ('smungaimuroki@gmail.com', 'Stephen Mungai Muroki', 'steve.jpg', 'kenya')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $sqlInsert = "insert into countries (name) values ('United States of America (USA)')";

// $conn->close();

?>