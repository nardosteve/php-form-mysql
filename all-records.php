<?php include 'header.php' ?>
<?php include 'db_connection/connection.php' ?>

<?php 
    $selectAll = "SELECT * FROM userrecords;";
    $results = $conn->query($selectAll);

    echo '<div class="container table-responsive mt-5">
            <h1 class="display-4 my-2 text-center">All Users</h1>
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Email Address</th>
                <th scope="col">Full Names</th>
                <th scope="col">File Upload</th>
                <th scope="col">Country</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
        <tbody>
        <div class="d-flex justify-content-end mb-4">
            <a href="form.php" class="btn btn-outline-primary">Add Record</a>
        </div>
        ';
    //Protect the user id
    // $count = uniqid();
    $count = 0;
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            //Count to generate new numbers
            $count++;
            // echo "id: ". $row["id"] . "<br>" . "Email Address: ". $row["emailAddress"];
            echo '<tr>';
            echo '<th scope="row">' . $count . '</th>';
            echo '<td>' . $row["emailAddress"] . '</td>';
            echo '<td>' . $row["fullNames"] . '</td>';
            echo '<td>' . $row["uploadImage"] . '</td>';
            echo '<td>' . $row["country"] . '</td>';
            echo '<div class="row">';
            echo "<td><a href='#view". $row['id'] . "' data-bs-toggle='modal' data-bs-target='#view". $row['id'] . "'><img src='icons/eye.svg'></a></td>";          
            echo "<td><a href='#edit". $row['id'] . "' data-bs-toggle='modal' data-bs-target='#edit". $row['id'] . "' data-bs-whatever='@mdo'><img src='icons/pencil-square.svg'></a></td>";        
            echo '<td><a href="db_connection/delete_data.php?deleteId='. $row['id'].'"><img src="icons/trash.svg"></a></td>';       
            echo '</div<>';
            echo '</tr>';

            //View Modal
            echo "<div class='modal fade' id='view". $row['id'] . "' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>";
            echo "
                    <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='staticBackdropLabel'>UserForm Data</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                ";
                            echo "<h1 class='h5'>Email Address</h1>";
                            echo '<p class="mb-3">' . $row["emailAddress"] . '</p>';

                            echo "<h1 class='h5'>Names</h1>";
                            echo '<p class="mb-3">' . $row["fullNames"] . '</p>';

                            echo "<h1 class='h5'>File(s) Uploaded</h1>";
                            echo '<p class="mb-3">Protected <img src="icons/shield-check.svg"></p>';

                            echo "<h1 class='h5'>Country</h1>";
                            echo '<p class="mb-3">' . $row["country"] . '</p>';
            echo "
                        </div>
                        <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                        </div>
                    </div>
                    </div>
                 ";

            echo "</div>";

            //Edit Modal Form
            echo "
                <div class='modal fade' id='edit". $row['id'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='exampleModalLabel'>UserForm Data</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                        <form action='db_connection/update_data.php?updateId=" . $row["id"] ."' method='POST' enctype='multipart/form-data'>
                            <div class='mb-3'>
                                <label for='email' class='col-form-label'>Email Address</label>
                                <input type='text' class='form-control' value='" . $row['emailAddress'] . "' id='email' name='email'>
                            </div>
                            <div class='mb-3'>
                                <label for='names' class='col-form-label'>Full Names</label>
                                <input type='text' class='form-control' value='" . $row['fullNames'] . "' id='names' name='names'>
                                
                            </div>
                            <div class='mb-3'>
                                <label for='uploadFile' class='col-form-label'>Upload File</label>
                                <input type='file' class='form-control' id='uploadFile' name='uploadFile'>
                            </div>
                            <div class='mb-3'>
                                <label for='country' class='col-form-label'>Country</label>
                                <input type='text' class='form-control' value='" . $row['country'] . "' id='country' name='country'>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                <button type='submit' name='submit' class='btn btn-outline-primary'>Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            ";
        }

    }else{

    }
?>

        </tbody>
    </table>
</div>

<?php include 'footer.php' ?>

