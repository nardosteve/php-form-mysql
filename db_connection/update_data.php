<?php

include_once 'connection.php';

if(isset($_POST['submit'])){
    $id = $_GET["updateId"];

    $email = sanitizeInput($_POST['email']);
    $names = sanitizeInput($_POST['names']);

    //File handling
    $fileName = $_FILES['uploadFile']['name'];
    //print_r($_FILES['uploadImage']);

    $fileTmp = $_FILES['uploadFile']['tmp_name'];
    //print_r($fileTmp);
    $fileSize = $_FILES['uploadFile']['size'];
    $fileError = $_FILES['uploadFile']['error'];
    $fileType = $_FILES['uploadFile']['type'];

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
                $fileDestination = '../files/'.$fileNewName;
                //Move file from temporary location to new location
                $newLocation = move_uploaded_file($fileTmp, $fileDestination);

                echo "Updated Successfully" . $newLocation;

                header('location: ../all-records.php');
                

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

    $country = sanitizeInput($_POST['country']);

    $sqlUpdate = "UPDATE userform SET 
        id = '$id',
        emailAddress = '$email',
        fullNames = '$names',
        uploadImage = '$fileDestination',
        country = '$country'
    ";

    if($conn->query($sqlUpdate)){
        echo "User Added & File Updated!!";
    }else{
        echo " Error:" . $sqlInsert . "<br>" . $conn->error;
    }

$conn->close();
}

?>