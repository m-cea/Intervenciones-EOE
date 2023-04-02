<?php

include("..\db.php");

if (isset($_POST['agendar'])) {
  $title= $_POST['title'];
  $fecha = $_POST['fecha'];
  $hora = $_POST['hora'];
  $query = "INSERT INTO `intervenciones-agendadas` (title, start) VALUES ('$title', '$fecha''$hora'':00')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarea Agendada';
  $_SESSION['message_type'] = 'success';
  header('Location: ..\index.php');

}
