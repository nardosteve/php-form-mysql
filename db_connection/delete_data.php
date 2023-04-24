<?php

if(isset($_GET["deleteId"])){

    $id = $_GET["deleteId"];

    $sqlDelete = "DELETE FROM userform WHERE id = $id";

    $result = mysqli_query($conn, $sqlDelete);

    if($result){
        echo "User Delete!";
    }else{
        die(mysqli_error($conn));
    }
}


?>
