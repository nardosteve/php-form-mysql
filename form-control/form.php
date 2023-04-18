<div class="container md">
    <form action="../db_connection/insert_data.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="john.doe@gmail.com">
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
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Kenya">
            </div>
        </div>
        <div class="d-grid gap-2">
            <!-- <button type="submit" class="btn btn-primary" name="submit">Submit</button> -->
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
    </form>
</div>
