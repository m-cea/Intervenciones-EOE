<?php

include('../db.php');

if (isset($_POST['guardar_intervencion_docente'])) {
  $docente = $_POST['id'];
  $fecha= $_POST['fecha'];
  $intervencion = $_POST['intervencion'];
  $query = "INSERT INTO `intervenciones-docentes` (docente, fecha, intervención) VALUES ('$docente', '$fecha', '$intervencion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Intervención guardada correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../index.php');

}

?>