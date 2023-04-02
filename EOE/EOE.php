<?php include("../db.php"); ?>

<?php include('../Includes/header.php'); ?>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../index.php">Registro de Actividades EOE</a>
  </div>
</nav>

<!-- Añadir -->
<div class="row justify-content-center">
  <div class="col-md-10">
    <form action="guardar EOE.php" method="POST">
      <div class="row d-flex justify-content-center">
        <div class="col-md-3">
          <h2>Añadir Intervención</h2><p><br></p>
        </div>
      </div>
      <div class="form-group">
        <label for="intervencion"> Fecha: </label>
        <input type="date" name="fecha" class="form-control" placeholder="Fecha" autofocus required><p><br></p>
      </div>
      <div class="form-group">
        <label for="intervencion"> Intervención: </label><br><textarea name="intervencion" rows="3" cols="160" required autofocus></textarea><p><br></p>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-3">
          <input type="submit" name="guardar_eoe" class="btn btn-success btn-block" value="Guardar Intervención"><p><br></p>
        </div>
      </div>        
    </form>
  </div>
</div>
    
    

<div class="row justify-content-center"><br><br>
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
        $query = "SELECT * FROM `intervenciones-emergentes` ORDER BY fecha DESC";
        $result_tasks = mysqli_query($conn, $query);    
        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
        <tr>
          <td><?php echo $row['Fecha']; ?></td>
          <td><?php echo $row['Intervencion']; ?></td>
          <td>
            <a href="editar-EOE.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
              <i class="fas fa-marker"></i> Editar
            </a>
            <a href="eliminar-EOE.php?ID=<?php echo $row['ID']?>" class="btn btn-danger" onclick='return confirmar()'>
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