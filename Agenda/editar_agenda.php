<?php
include("../db.php");

$title = '';
$start= '';

if  (isset($_POST['id'])) {
  $id = $_POST['id'];
  $query = "SELECT * FROM `intervenciones-agendadas` WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['title'];
    $start = $row['start'];
  }
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $title= $_POST['title'];
  $start = $_POST['start'];

  $query = "UPDATE `intervenciones-agendadas` SET title = '$title', start = '$start' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Tarea actualizada correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../Includes/header.php'); ?>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php">Registro de Actividades EOE</a>
  </div>
</nav>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_agenda.php?id=<?php echo $_POST['id_evento_edit']; ?>" method="POST">
        <p>Modificar Tarea</p>
        <div class="form-group">
          <input name="id" type="text" class="form-control" value="<?php echo $_POST['id_evento_edit']; ?>" hidden>
        </div>
        <div class="form-group">
        <label for="title">Nueva Tarea:</label>
          <input name="title" type="text" class="form-control" value="<?php echo $title; ?>" required>
        </div>
        <div class="form-group">
          <label for="start">Nueva Fecha:</label>
          <input name="start" type="datetime-local" class="form-control" required>
        </div>
        <button class="btn btn-success" name="update">
          Editar
        </button>
        <a href="index.php" class="btn btn-dark">Volver</a>
      </form>
    </div>
    </div>
  </div>
</div>
<?php include('../Includes/footer.php'); ?>