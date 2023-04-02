<?php

include("..\db.php");

if(isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "DELETE FROM `intervenciones-docentes` WHERE Codigo = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Intervencion Eliminada';
  $_SESSION['message_type'] = 'danger';
  header('Location: ..\index.php');
}

?>