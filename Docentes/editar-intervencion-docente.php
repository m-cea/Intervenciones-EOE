<?php
include("../db.php");
$fecha = '';
$intervencion= '';

if  (isset($_GET['Codigo'])) {
  $id = $_GET['Codigo'];
  $query = "SELECT * FROM `intervenciones-docentes` WHERE Codigo=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $fecha = $row['Fecha'];
    $intervencion = $row['Intervención'];
  }
}

if (isset($_POST['update'])) {
  $ID = $_GET['ID'];
  $fecha= $_POST['fecha'];
  $intervencion = $_POST['intervención'];

  $query = "UPDATE `intervenciones-docentes` SET Fecha = '$fecha', Intervención = '$intervencion' WHERE Codigo=$ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Intervención actualizada correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: ../index.php');
}

?>

<?php include('../includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar-intervencion-docente.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <p>Modificar Intervención</p>
        <div class="form-group">
          <input name="fecha" type="date" class="form-control" value="<?php echo $fecha; ?>" placeholder="Nueva Fecha">
        </div>
        <div class="form-group">
          <input name="intervencion" type="text" class="form-control" value="<?php echo $intervencion; ?>" placeholder="Nueva Intervención">
        </div>
        <button class="btn btn-success" name="update">
          Editar
        </button>
      
      <a href="../index.php" class="btn btn-dark">Volver</a>
      </div>
      </form>
    </div>
  </div>
</div>
<?php include('../includes/footer.php'); ?>