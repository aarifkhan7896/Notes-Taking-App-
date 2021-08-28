<!-- Designed & Built by Aarif Khan -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

$dbcon = mysqli_connect($servername,$username,$password,$database);
if(!$dbcon){
    die("Unable to connect".mysqli_connect_error($dbcon));
}
?>

<?php  
$insert = false;
$update = false;
$delete = false;

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
  $result = mysqli_query($dbcon, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){

    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];

  $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";
  $result = mysqli_query($dbcon, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $title = $_POST["title"];
    $description = $_POST["description"];

  $sql = "INSERT INTO `notes` (`title`, `description`, `date`) VALUES ('$title', '$description', current_timestamp());";
  $result = mysqli_query($dbcon, $sql); 
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">


    <title>Notes</title>

</head>

<body>

    <div class="container-fluid" id="header">
        <h1 class="text-warning">iNotes</h1> &nbsp;&nbsp;&nbsp; <span class="text-light">Best Note Taking
            App</span>
    </div>



    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="form-group">
                            <label for="title">Note Title</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="form-group">
                            <label for="desc">Note Description</label>
                            <textarea class="form-control" id="descriptionEdit" name="descriptionEdit"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-block mr-auto">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </button>
  </div>";
  }
  ?>
    <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </button>
  </div>";
  }
  ?>
    <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </button>
  </div>";
  }
  ?>
    <div class="container my-4" id="addnotes">
        <div class="container-fluid" id="heading">
            <h1 class="Display-1">Add a Note</h1>
        </div>
        <form class="notesform" action="index.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="desc">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10"
                    style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Add Note</button>
        </form>
    </div>


    <div class="notestable">
        <h1 class="text-center">Notes</h1>
        <div class="container my-4">



            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
          $sql = "SELECT * FROM `notes`";
          $result = mysqli_query($dbcon, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td>". $row['description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <footer>
            <h1>Designed & Built by Aarif Khan</h1>
        </footer>
    </div>
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="js/all.min.js"></script>
    <!-- Data Tables -->
    <script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
    </script>
    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[0].innerText;
            description = tr.getElementsByTagName("td")[1].innerText;
            console.log(title, description);
            titleEdit.value = title;
            descriptionEdit.value = description;
            snoEdit.value = e.target.id;
            console.log(e.target.id)
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            console.log("edit ");
            sno = e.target.id.substr(1);

            if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `index.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
            } else {
                console.log("no");
            }
        })
    })
    </script>
</body>

</html>