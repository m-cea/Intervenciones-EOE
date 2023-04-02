<?php include("../db.php"); ?>

<?php include('../Includes/header.php'); ?>

<!-- ADD TASK FORM -->

<div class="row d-flex justify-content-center">
  <div class="col-md-10">
    <form action="guardar docente.php" method="POST">
      
      <div class="row justify-content-center">
        <div class="col-md-3">
          <h2>Añadir Docente</h2><p><br></p>
        </div>
      </div>
      
      <div class="form-group">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus><p><br></p>
      </div>
      <div class="form-group">
        <input type="text" name="grado" class="form-control" placeholder="Grado" autofocus><p><br></p>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-3">
          <input type="submit" name="guardar_docente" class="btn btn-success btn-block" value="Guardar Docente"><p><br></p>
        </div>
      </div>
    </form>
  </div>
</div>


<div class="row d-flex justify-content-center">
  <div class="col-md-3">
    <h2>Listado de Intervenciones</h2><p><br></p>
  </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-10">
    <table class="table table-bordered">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Grado</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $query = "SELECT * FROM Docentes";
      $result_tasks = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result_tasks)) { ?>
       <tr>
         <td><?php echo $row['Nombre']; ?></td>
         <td><?php echo $row['Grado']; ?></td>
         <td>
           <a href="editar-docente.php?ID=<?php echo $row['ID']?>" class="btn btn-secondary">
             <i class="fas fa-marker"></i> Editar
           </a>
           <a href="eliminar-docente.php?ID=<?php echo $row['ID']?>" class="btn btn-danger" onclick='return confirmar()'>
             <i class="far fa-trash-alt"></i> Eliminar
           </a>
           <a href="intervenciones-docentes.php?ID=<?php echo $row['ID']?>" class="btn btn-info">
           <i class="fa-regular fa-eye"></i> Intervenciones
           </a>
         </td>
       </tr>
       <?php } ?>
    </tbody>
    </table>
    <a href="../index.php" class="btn btn-dark">Volver</a>
    </div>
  </div>
</div>

  <?php include('../Includes/footer.php'); ?>