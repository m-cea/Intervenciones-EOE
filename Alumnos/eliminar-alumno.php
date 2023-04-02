<?php

include("..\db.php");

if(isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "DELETE FROM Alumnos WHERE ID = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Alumno Eliminado';
  $_SESSION['message_type'] = 'danger';
  header('Location: ..\index.php');
}

?>