<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.js"></script>
<script src='fullcalendar/dist/index.global.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
<!-- Agendar -->
<div class="container py-5" id="page-container">
    <div class="row">
        <div class="col-md-9">
            <div id="calendar"></div>
        </div>
        <div class="col-md-3">
            <div class="cardt rounded-0 shadow">
                <div class="card-header bg-gradient bg-primary text-light">
                    <h5 class="card-title">Agendar Nueva</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="Agenda\guardar_agenda.php" method="post">
                            <div class="form-group mb-2">
                                <label for="title" class="control-label">Tarea</label>
                                <input type="text" class="form-control form-control-sm rounded-0" name="title" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="start" class="control-label">Fecha</label>
                                <input type="date" class="form-control form-control-sm rounded-0" name="fecha" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="start" class="control-label">Hora</label>
                                <input type="time" class="form-control form-control-sm rounded-0" name="hora" required>
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm rounded-0" type="submit" name="agendar"><i class="fa fa-save"></i> Agendar</button>
                        <button class="btn btn-default border btn-sm rounded-0" type="reset"><i class="fa fa-reset"></i> Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
            <br>
        <!-- Descargar Labor Mensual -->
            <div class="cardt rounded-0 shadow">
                <div class="card-header bg-gradient bg-primary text-light">
                    <h5 class="card-title">Descargar Labor Mensual</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <form action="Agenda\labor.php" method="post" id="labor" target="_blank">
                            <div class="form-group mb-2">
                            <label for="mes" class="control-label">Elegir el mes</label><br>
                            <select name="mes" class="form-select form-select mb-3" required>
                              <option value="1">Enero</option>
                              <option value="2">Febrero</option>
                              <option value="3">Marzo</option>
                              <option value="4">Abril</option>
                              <option value="5">Mayo</option>
                              <option value="6">Junio</option>
                              <option value="7">Julio</option>
                              <option value="8">Agosto</option>
                              <option value="9">Septiembre</option>
                              <option value="10">Octubre</option>
                              <option value="11">Noviembre</option>
                              <option value="12">Diciembre</option>
                            </select>
                            </div>
                            <div class="form-group mb-2">
                            <label for="anio" class="control-label">Elegir el año</label><br>
                            <select name="anio" class="form-select form-select mb-3" required>
                              <option value="2023">2023</option>
                            </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm rounded-0" type="submit" name="labor_mensual" form="labor"><i class="fa fa-save"></i> Descargar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Calendario-->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: "es",
      headerToolbar: {
        left: "prev next today",
        center: "title",
        right: 'dayGridMonth timeGridWeek timeGridDay'
        },
        events: [
        <?php
            $query = "SELECT * FROM `intervenciones-agendadas`";
            $result_tasks = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result_tasks)) { ?>
            
            {
                id: '<?php echo $row['id']; ?>',
                title: '<?php echo $row['title']; ?>',
                start: '<?php echo $row['start']; ?>',
            },
        <?php } ?>
      ],
      eventClick: function(eventClickInfo){
        $('#evento').html(eventClickInfo.event.title);
        $('#desc_evento').html(eventClickInfo.event.title);
        $('#id_evento_edit').val(eventClickInfo.event.id);
        $('#id_evento_del').val(eventClickInfo.event.id);
        $('#fecha_evento').val(eventClickInfo.event.start.toLocaleDateString());
        $('#hora_evento').val(eventClickInfo.event.start.toLocaleTimeString());
        $('#event-details-modal').modal('show');
      }
    });
    calendar.render();
  });
  
</script>

<!-- Modal DayClick-->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title" id="evento"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0">
                <form action="Agenda\editar_agenda.php" method="POST">
                    <input type="text" readonly id="id_evento_edit" name="id_evento_edit" hidden>
                    <input type="text" readonly id="desc_evento" name="desc_evento" hidden>
                    <label for="fecha_evento"> Fecha: </label><input type="text" readonly id="fecha_evento" name="fecha_evento" class="border-0"><br>
                    <label for="hora_evento"> Hora: </label><input type="text" readonly id="hora_evento" name="hora_evento" class="border-0"><br>
            </div>
            <div class="modal-footer rounded-0">
                        <button type="submit" class="btn btn-secondary" id="edit"><i class="fas fa-marker"></i> Editar</button>
                        </form>
                        <form action="Agenda\eliminar_agenda.php" method="POST">
                            <input type="text" readonly id="id_evento_del" name="id_evento_del" hidden>
                            <button type="submit" class="btn btn-danger" id="del"><i class="far fa-trash-alt" onclick='return confirmar()'></i> Eliminar</button>
                        </form>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Volver</button>
                </div>
            </div>
        </div>
    </div>
</div>