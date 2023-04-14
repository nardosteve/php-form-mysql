<?php

include_once 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $names = $_POST['names'];
    $uploadImage = $_POST['uploadImage'];
    $country = $_POST['country'];

    $sqlInsert = "INSERT INTO userform (emailAddress, fullNames, fullNames, country)
        VALUES('$email', '$names', '$uploadImage', '$country')";

    if($conn->query($sqlInsert) === TRUE){
        echo "User Added!";
    }else{
        echo " Error:" . $sqlInsert . "<br>" . $conn->error;
    }

}

?>