<?php
include("../db.php");
$nombre = '';
$grado= '';

if  (isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "SELECT * FROM Docentes WHERE ID=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['Nombre'];
    $grado = $row['Grado'];
  }
}

if (isset($_POST['update'])) {
  $ID = $_GET['ID'];
  $nombre= $_POST['nombre'];
  $grado = $_POST['grado'];

  $query = "UPDATE Docentes SET nombre = '$nombre', grado = '$grado' WHERE ID=$ID";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Docente actualizado correctamente';
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
      <form action="editar-docente.php?ID=<?php echo $_GET['ID']; ?>" method="POST">
        <p>Modificar datos de Docente</p>
        <div class="form-group">
          <label for="nombre">Nuevo Nombre:</label>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-group">
          <label for="grado">Nuevo Grado:</label>
          <input name="grado" type="text" class="form-control" value="<?php echo $grado; ?>" required>
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