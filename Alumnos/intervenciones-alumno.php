<?php include("../db.php"); 

$docente = '';
$nombre = '';
$grado = '';

if  (isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $query = "SELECT * FROM Alumnos WHERE ID=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $alumno = $row['ID'];
    $nombre = $row['Nombre'];
    $grado = $row['Grado'];
  }
}?>

<?php include('../Includes/header.php'); ?>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php">Registro de Actividades EOE</a>
  </div>
</nav>

<!-- Añadir -->

<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <form action="guardar-intervencion-alumno.php" method="POST">
      
      <div class="row d-flex justify-content-center">     
        <div class="col-md-3">    
          <h2>Añadir intervención</h2>
        </div>
      </div>

      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="form-group">
            <input type="number" name="id" class="form-control" placeholder="id" value = "<?php echo $alumno ?>" hidden autofocus> <p><br></p>
          </div>
          <div class="form-group">
            Alumno:<input type="text" name="docente" class="form-control" value = "<?php echo $nombre ?>" readonly autofocus> <p><br></p>
          </div>
          <div class="form-group">
            Grado:<input type="text" name="grado" class="form-control" value = "<?php echo $grado ?>" readonly autofocus> <p><br></p>
          </div>
          <div class="form-group">
            Fecha: <input type="date" name="fecha" class="form-control" placeholder="Fecha" autofocus required><p><br></p>
          </div>
        </div>

        <div class="col-md-2">
          <p><br></p>
          <div class="form-group">
          <label for="fecha"> Intervención:</label><br>
            <textarea name="intervencion" rows="5" class="form control" placeholder="Escribir aquí" autofocus></textarea>
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
      
      <div class="row d-flex justify-content-center">
        <div class="col-md-2">
          <input type="submit" name="guardar_intervencion_alumno" class="btn btn-success btn-block" value="Guardar Intervención">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="row d-flex justify-content-center"><br><br>
<div class="col-md-3">
  <h2>Listado de Intervenciones</h2>
</div>
    <div class="col-md-10">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Intervención</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
         <?php
          $query = "SELECT * FROM `intervenciones-alumnos` AS i INNER JOIN Alumnos AS a ON i.Alumno = a.ID WHERE a.ID = $id ORDER BY i.Fecha DESC";
          $result_tasks = mysqli_query($conn, $query);
         while($row = mysqli_fetch_array($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['Fecha']; ?></td>
            <td><?php echo $row['Intervencion']; ?></td>
            <td>
              <a href="editar-intervencion-alumno.php?ID=<?php echo $row['Codigo']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i> Editar
              </a>
              <a href="eliminar-intervencion-alumno.php?ID=<?php echo $row['Codigo']?>" class="btn btn-danger" onclick='return confirmar()'>
                <i class="far fa-trash-alt"></i> Eliminar
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
      <a href="../index.php" class="btn btn-dark">Volver</a>
    </div>
</div>

<?php include('../Includes/footer.php'); ?>