<?php

if(isset($_GET["deleteId"])){

    $id = $_GET["deleteId"];

    $sqlDelete = "DELETE FROM userform WHERE id = $id";



}


?>
