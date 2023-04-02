<?php

include('../db.php');

if (isset($_POST['guardar_docente'])) {
  $nombre= $_POST['nombre'];
  $grado = $_POST['grado'];
  $query = "INSERT INTO Docentes (nombre, grado) VALUES ('$nombre', '$grado')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Docente guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ../index.php');

}

?>
