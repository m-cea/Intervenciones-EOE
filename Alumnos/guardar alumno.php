<?php

include("..\db.php");

if (isset($_POST['guardar_alumno'])) {
  $nombre= $_POST['nombre'];
  $grado = $_POST['grado'];
  $motivo = $_POST['motivo'];
  $query = "INSERT INTO Alumnos (nombre, grado, motivo) VALUES ('$nombre', '$grado', '$motivo')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Alumno guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: ..\index.php');

}

?>
