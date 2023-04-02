<?php include("db.php"); ?>

<?php include('Includes/header.php'); ?>

<main class="container p-4">

      <!-- Mensajes -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php session_unset(); } ?>
  
  <div class="row justify-content-center">
    <h1> Actividades EOE </h1>
  </div>

  <div class="row justify-content-center">
    <p><br><br></p>
  </div>

  <div class="row justify-content-center">
      <div class="col-md-3">
        <h2>Intervenciones con <b>Alumnos</b></h2>
        <a href="Alumnos\alumnos.php"" class="btn btn-primary">Ver Alumnos</a>
      </div>
      
    <div class="col-md-3">
      <h2>Intervenciones con <b>Docentes</b></h2>
      <a href="Docentes\docentes.php" class="btn btn-primary">Ver Docentes</a>
    </div>

    <div class="col-md-3">
      <h2>Intervenciones desde el <b>EOE</b></h2>
      <a href="EOE\EOE.php" class="btn btn-primary">Ver Intervenciones</a>
    </div>
  </div>

  <div class="row justify-content-center">
    <p><br><br></p>
  </div>

  <div class="row justify-content-center">
    <h1> Agenda de Intervenciones </h1>
  </div>

  <div class="row justify-content-center">
    <p><br><br></p>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-12">
      <?php include('Agenda\calendar.php'); ?>
      <div id="calendar"></div>
    </div>
 
    </div>
  </div>

</main>

<?php include('Includes/footer.php'); ?>

