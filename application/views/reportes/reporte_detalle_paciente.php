<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-10">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Detalle Paciente</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">



            <div class="form-group">
              <div class="container border">
                <div class="container">
                  <h5>Paciente</h5>
                  <table class="table">
                    <?php
                    if (isset($pacienteTutor)) {
                      foreach ($pacienteTutor->result() as $row) {
                    ?>
                        <tr>
                          <td class="col-sm-2"><b>Nombre Completo: </b></td>
                          <td><?php echo $row->nombrePaciente . "  " . $row->primerApellidoPaciente . "  " . $row->segundoApellidoPaciente; ?></td>
                        </tr>
                    <?php
                      }
                    }
                    echo form_close();
                    ?>
                  </table>
                </div>
                <div class="container">
                  <h5>Datos Tutor</h5>
                  <table class="table">
                    <?php
                    if (isset($pacienteTutor)) {
                      foreach ($pacienteTutor->result() as $row) {
                    ?>
                        <tr>
                          <td class="col-sm-2"><b>Nombre Completo: </b></td>
                          <td><?php echo $row->nombreTutor." ".$row->primerApellidoTutor." ".$row->segundoApellidoTutor; ?></td>
                        </tr>
                        <tr>
                          <td><b>CI: </b></td>
                          <td><?php echo $row->ci ?></td>
                        </tr>
                    <?php
                      }
                    }
                    echo form_close();
                    ?>
                  </table>
                </div>

              </div>
              <div class="container">
                <h5>Reporte Vacunas Aplicadas</h5>
                <table class="table table-bordered table-striped">
                  <th>Edad de Aplicacion Meses</th>
                  <th>Vacuna dosis</th>
                  <th>Fecha vacuna</th>
                  <?php
                  if (isset($pacienteDosis)) {
                    foreach ($pacienteDosis->result() as $row) {
                      if ($row->fechaVacuna) {
                  ?>
                        <tr class="bg-color-' + color + '">
                          <td><?php echo $row->rangoMesInicial; ?></td>
                          <td><?php echo $row->nombrevacuna . " " . $row->dosis . " " . $row->nombrevia ?></td>
                          <td><?php echo $row->fechaVacuna; ?></td>
                        </tr>
                  <?php
                      }
                    }
                  }
                  echo form_close();
                  ?>
                </table>
              </div>
              <div class="container">
                <h5>Siguiente Vacuna</h5>
                <table class="table table-bordered table-striped">
                  <th>Edad de Aplicacion Meses</th>
                  <th>Vacuna dosis</th>
                  <th>Fecha Siguiente dosis</th>
                  <?php
                  if (isset($pacienteDosis)) {
                    foreach ($pacienteDosis->result() as $row) {
                      if ($row->fechaSiguienteDosis && !$row->fechaVacuna) {
                  ?>
                        <tr class="bg-color-' + color + '">
                          <td><?php echo $row->rangoMesInicial; ?></td>
                          <td><?php echo $row->nombrevacuna . " " . $row->dosis . " " . $row->nombrevia ?></td>
                          <td><?php echo $row->fechaSiguienteDosis ?></td>
                        </tr>
                  <?php
                      }
                    }
                  }
                  echo form_close();
                  ?>
                </table>
              </div>
              <div class="container">
                <h5>Vacunas Pendientes</h5>
                <table class="table table-bordered table-striped">
                  <th>Edad de Aplicacion Meses</th>
                  <th>Vacuna dosis</th>
                  <th>Fecha vacuna</th>
                  <th>Fecha Siguiente dosis</th>
                  <?php
                  if (isset($pacienteDosis)) {
                    foreach ($pacienteDosis->result() as $row) {
                      if (!$row->fechaSiguienteDosis && !$row->fechaVacuna) {
                  ?>
                        <tr class="bg-color-' + color + '">
                          <td><?php echo $row->rangoMesInicial; ?></td>
                          <td><?php echo $row->nombrevacuna . " " . $row->dosis . " " . $row->nombrevia ?></td>
                          <td><?php echo $row->fechaVacuna; ?></td>
                          <td><?php echo $row->fechaSiguienteDosis ?></td>
                        </tr>
                  <?php
                      }
                    }
                  }
                  echo form_close();
                  ?>
                </table>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</div>