<?php

include('../db.php');

if (isset($_POST['guardar_eoe'])) {
  $fecha= $_POST['fecha'];
  $intervencion = $_POST['intervencion'];
  $query = "INSERT INTO `intervenciones-emergentes` (fecha, intervencion) VALUES ('$fecha', '$intervencion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Intervención guardada correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../index.php');

}

?>