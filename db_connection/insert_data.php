<?php
// echo"<pre>".print_r($_POST,1)."</pre>";
// exit;

include_once 'connection.php';

$response = array(
    'status' => 0,
    'message' => "Something went wrong!"
);


//$_POST[] - is an associative array (Key -> value)
if(isset($_POST['submit'])){
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
        if($fileError === 0 && $uploadStatus === 1){
            //Check file size
            if($fileSize < 5000000){
                //Upload the file to the DB
                //Prevent Upload Override (generate unique name)
                $fileNewName = uniqid('', true). "." . $fileActualExtension;
                //New destination of the uploaded file in the root folder
                $fileDestination = '../files/'.$fileNewName;
                //Move file from temporary location to new location
                $newLocation = move_uploaded_file($fileTmp, $fileDestination);

                // echo "Uploaded Successfully" . $newLocation;
                $uploadStatus = 1;
                header('location: ../form.php?upload=success');
            }else{
                // echo "File is too Big!";
                header('location: ../form.php?upload=sizeTooBig'); 
                // $uploadStatus = 0;  
            }
        }else{
            // echo "Error Occured";
            header('location: ../form.php?upload=errorOccured');   
            // $uploadStatus = 0;
        }
    }else{
        // echo "You can't upload this file type";
        header('location: ../form.php?upload=fileTypeError'); 
        // $uploadStatus = 0;
    }
    //File handling

    $country = $_POST['country'];

    //More Error Handlers
    // if(empty($email) || empty($names) || empty($fileName) || empty($country)){
    //     header('location: ../form.php?validate=emptyFields'); 
    // }else if(!filter_var($email, FILTER_VALIDATE_EMAIL, 200)){
    //     header('location: ../form.php?validate=invalidEmail'); 
    // }
    // //More Error Handlers

    if($uploadStatus == 1){
        $sqlInsert = "INSERT INTO userrecords (emailAddress, fullNames, uploadImage, country)
        VALUES('$email', '$names', '$fileDestination', '$country')";

        if($conn->query($sqlInsert)){
           $response['status'] = 1;
           $response['message'] = "Data Saved!";
        }else{
            $response['message'] = "Fill in your data";
        }

    }
    else{
        $response['message'] = "Whats up ?";
    }

    // $sqlInsert = "INSERT INTO userrecords (emailAddress, fullNames, uploadImage, country)
    //     VALUES('$email', '$names', '$fileDestination', '$country')";

    // echo "$sqlInsert";
    // exit;

    // if($conn->query($sqlInsert)){
    //     echo "User Added & File Uploaded!!!";
    // }else{
    //     echo "Error:" . $sqlInsert . "<br>" . $conn->error;
    // }

$conn->close();

}

echo json_encode($response);

//Sanitize forms (Validation)
function sanitizeInput($inputText){
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ", "", $inputText);
    $inputText = strtolower($inputText);
    $inputText = ucfirst($inputText);

    return $inputText;
}

?>