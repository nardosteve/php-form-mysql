<?php include 'header.php' ?>
<?php include 'db_connection/connection.php' ?>

<?php 
    $selectAll = "SELECT * FROM userform;";
    $results = $conn->query($selectAll);

    echo '<div class="container table-responsive mt-5">';
    echo '<table class="table table-striped">';
    echo '
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">File Upload</th>
                <th scope="col">Country</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
        ';
    echo '<tbody>';
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
            echo '<div class="row">
                    <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><img src="icons/eye.svg"></a></td>    
                    <td><a href=""><img src="icons/pencil-square.svg"></a></td>
                    <td><a href=""><img src="icons/trash.svg"></a></td>
                </div<>';
            echo '</tr>';

            echo '
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form>
                            <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Send message</button>
                        </div>
                    </div>
                    </div>
                </div>
            ';
        }

    }else{

    }
?>

        </tbody>
    </table>
</div>

<?php include 'footer.php' ?>

