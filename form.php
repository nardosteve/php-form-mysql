<?php include 'header.php' ?>

<?php 
    include 'db_connection/connection.php'; 
?>

<div class="container mt-5 w-50">

    <h1 class="displa-2 my-5 text-center">Upload user data</h1>

    <form action="../db_connection/insert_data.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="john.doe@gmail.com" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="names" class="form-label">Full Names</label>
                <input type="text" class="form-control" id="names" name="names" placeholder="John Doe">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="uploadFile" class="form-label">Upload File</label>
                <input class="form-control" type="file" id="uploadFile" name="uploadFile">
            </div>
            <div class="col-md-6 col-sm-12 mb-3">
                <label for="country" class="form-label">Countries</label>
                <?php 
                    $getCountres = "SELECT * FROM countries";
                    $countries = mysqli_query($conn, $getCountres);
                ?>
                <!-- <input type="text" class="form-control" id="country" name="country" placeholder="Kenya"> -->
                <select class="form-select" aria-label=".form-select example" id="country" name="country">
                    <!-- <option selected-disabled>Countries</option> -->
                    <?php while($row = mysqli_fetch_assoc($countries)) { ?>
                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="d-grid gap-2">
            <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button> -->
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
    </form>

    <!-- Error Handlers -->
    <?php
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if(strpos($fullUrl, "upload=success")){
            echo '
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <strong>Congratulations!</strong> User Data Added!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }else if(strpos($fullUrl, "upload=sizeTooBig")){
            echo '
                <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                    <strong>Yikes!</strong> File is too big
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }else if(strpos($fullUrl, "upload=sizeTooBig")){
            echo '
                <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                    <strong>Yikes!</strong> File is too big
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
    ?>
    <!-- Error Handlers -->

</div>

<?php include 'footer.php' ?>
