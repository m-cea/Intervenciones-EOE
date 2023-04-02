<?php
include("../db.php");

$fecha = '';
$intervencion= '';

if  (isset($_GET['Codigo'])) {
  $id = $_GET['Codigo'];
  $query = "SELECT * FROM `intervenciones-alumnos` WHERE Codigo=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $fecha = $row['Fecha'];
    $intervencion = $row['Intervencion'];
  }
}

if (isset($_POST['update'])) {
  $ID = $_GET['ID'];
  $fecha= $_POST['fecha'];
  $intervencion = $_POST['intervencion'];

  $query = "UPDATE `intervenciones-alumnos` SET Fecha = '$fecha', Intervencion = '$intervencion' WHERE Codigo=$ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Intervención actualizada correctamente';
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
      <form action="editar-intervencion-alumno.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <p>Modificar Intervención</p>
        <div class="form-group">
          <label for="intervencion">Nueva Fecha:</label>  
          <input name="fecha" type="date" class="form-control" value="<?php echo $fecha; ?>" required>
        </div>
        <div class="form-group">
          <label for="intervencion">Nueva Intervención:</label>
          <input name="intervencion" type="text" class="form-control" value="<?php echo $intervencion; ?>" required>
        </div>
        <br>
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