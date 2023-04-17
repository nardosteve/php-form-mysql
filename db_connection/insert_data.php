<?php

include_once 'connection.php';

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $names = $_POST['names'];

    //File handling
    $fileName = $_FILES['uploadImage']['name'];
    //print_r($_FILES['uploadImage']);

    $fileTmp = $_FILES['uploadImage']['tmp_name'];
    //print_r($fileTmp);
    $fileSize = $_FILES['uploadImage']['size'];
    $fileError = $_FILES['uploadImage']['error'];
    $fileType = $_FILES['uploadImage']['type'];

    //Explode the file name by the extension
    $fileExtension = explode('.', $fileName);
    //print_r($fileExtension);
    //Make file extension lowercase
    $fileActualExtension = strtolower(end($fileExtension));
    //Allowed files extensions
    $allowedFileExtensions = array('jpg', 'jpeg', 'png', 'pdf');
    //Check if the extensions exists
    if(in_array($fileActualExtension, $allowedFileExtensions)){
        //No error uploading the file
        if($fileError === 0){
            //Check file size
            if($fileSize < 5000000){
                //Upload the file to the DB
                //Prevent Upload Override (generate unique name)
                $fileNewName = uniqid('', true). "." . $fileActualExtension;
                //New destination of the uploaded file in the root folder
                $fileDestination = '../images/'.$fileNewName;
                //Move file from temporary location to new location
                $newLocation = move_uploaded_file($fileTmp, $fileDestination);

                echo "Uploaded Successfully" . $newLocation;

            }else{
                echo "File is too Big!";
            }
        }else{
            echo "Error Occured";
        }
    }else{
        echo "You can't upload this file type";
    }
    //File handling

    $country = $_POST['country'];

    $sqlInsert = "INSERT INTO userform (emailAddress, fullNames, uploadFile, country)
        VALUES('$email', '$names', '$uploadImage', '$country')";

    if($conn->query($sqlInsert) === TRUE){
        echo "User Added & Image!";
    }else{
        echo " Error:" . $sqlInsert . "<br>" . $conn->error;
    }

}

?>