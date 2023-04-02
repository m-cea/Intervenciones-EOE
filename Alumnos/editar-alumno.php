<?php
include("../db.php");
$nombre = '';
$grado= '';
$motivo= '';

if  (isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "SELECT * FROM Alumnos WHERE ID=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['Nombre'];
    $grado = $row['Grado'];
    $motivo = $row['Motivo'];
  }
}

if (isset($_POST['update'])) {
  $ID = $_GET['ID'];
  $nombre= $_POST['nombre'];
  $grado = $_POST['grado'];
  $motivo = $_POST['motivo'];

  $query = "UPDATE Alumnos SET nombre = '$nombre', grado = '$grado', motivo = '$motivo' WHERE ID=$ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Alumno actualizado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>
<?php include('../Includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar-alumno.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <p>Modificar datos del Alumno</p>
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nuevo Nombre">
        </div>
        <div class="form-group">
          <input name="grado" type="text" class="form-control" value="<?php echo $grado; ?>" placeholder="Nuevo Grado">
        </div>
        <div class="form-group">
          <input name="motivo" type="text" class="form-control" value="<?php echo $motivo; ?>" placeholder="Nuevo Motivo">
        </div>
        <button class="btn btn-success" name="update">
          Editar
        </button>
        <a href="../index.php" class="btn btn-dark">Volver</a>
      </form>
      
      </div>
    </div>
  </div>
</div>
<?php include('../Includes/footer.php'); ?>