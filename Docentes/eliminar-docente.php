<?php
include("..\db.php"); ?>

<?php
if(isset($_GET['ID'])) {
  $id = $_GET['ID'];

  


  $query = "DELETE FROM Docentes WHERE ID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Docente Eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: ..\index.php');
}

?>