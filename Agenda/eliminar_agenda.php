<?php
        include("../db.php");

        if(isset($_POST['id_evento_del'])) {
          $id = $_POST['id_evento_del'];
          $query = "DELETE FROM `intervenciones-agendadas` WHERE id = $id";
          $result = mysqli_query($conn, $query);
          if(!$result) {
            die("Query Failed.");
          }
        
          $_SESSION['message'] = 'Evento Eliminado';
          $_SESSION['message_type'] = 'danger';
          header('Location: ../index.php');
        }

    	?>