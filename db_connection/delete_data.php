<?php

include_once 'connection.php';

if(isset($_GET["deleteId"])){

    $id = $_GET["deleteId"];

    $sqlDelete = "DELETE FROM userrecords WHERE id = $id";

    $result = $conn->query($sqlDelete);

    if($result){
        echo "User Data Delete!";
        header("location: ../all-records.php");
    }else{
        die(mysqli_error($conn));
    }
}


?>
