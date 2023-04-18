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
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">File Upload</th>
                <th scope="col">Country</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
        ';
    echo '<tbody>';

    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            // echo "id: ". $row["id"] . "<br>" . "Email Address: ". $row["emailAddress"];
            echo '<tr>';
            echo '<th scope="row">' . $row["id"] . '</th>';
            echo '<td>' . $row["emailAddress"] . '</td>';
            echo '<td>' . $row["fullNames"] . '</td>';
            echo '<td>' . $row["uploadImage"] . '</td>';
            echo '<td>' . $row["country"] . '</td>';
            echo '</tr>';
        }

    }else{

    }
?>

        </tbody>
    </table>
</div>

<?php include 'footer.php' ?>

