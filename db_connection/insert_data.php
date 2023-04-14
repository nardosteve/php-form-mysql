<?php

include_once 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $names = $_POST['names'];

    //Image handling
    $uploadImage = $FILES['uploadImage']['name'];
    $tempName = $FILES['uploadImage']['tmp_name'];
    $folder = "../images/" . $uploadImage;
    //Image handling

    $country = $_POST['country'];

    $sqlInsert = "INSERT INTO userform (emailAddress, fullNames, fullNames, country)
        VALUES('$email', '$names', '$uploadImage', '$country')";

    if($conn->query($sqlInsert) === TRUE && move_uploaded_file($tempName, $folder)){
        echo "User Added!";
    }else{
        echo " Error:" . $sqlInsert . "<br>" . $conn->error;
    }

}

?>