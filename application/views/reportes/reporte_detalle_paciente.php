<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-10">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Detalle Paciente</div>
          </div>
          <?php
          echo form_open_multipart('reportes/imprimir');
          ?>
          <div class="p-3">
            <input type="hidden" name="idPaciente" value="<?php echo $idPaciente?>">
            <button class="btn btn-primary" id="pdf">PDF</button>
          </div>
      
          <?php
            echo form_close();
          ?>
          <!-- /.card-header -->
          <div class="card-body contenido-detalle">
            <div class="container text-center">
              <h5><b>REPORTE PACIENTE</b></h5>
            </div>
            <div class="form-group">
              <div class="container border">
                <h5><b>INFORMACION TUTOR Y PACIENTE</b></h5>
                <div class="container">
                  <table class="table">
                    <?php
                    if (isset($pacienteTutor)) {
                      foreach ($pacienteTutor->result() as $row) {
                    ?>
                        <tr>
                          <td class="col-sm-2"><b>TUTOR:</b></td>
                          <td><b><?php echo $row->nombreTutor." ".$row->primerApellidoTutor." ".$row->segundoApellidoTutor; ?></b></td>
                        </tr>
                        <tr>
                          <td><b>CI: </b></td>
                          <td><b><?php echo $row->ci ?></b></td>
                        </tr>
                    <?php
                      }
                    }
                    echo form_close();
                    ?>
                  </table>
                </div>
                <div class="container">
                  <table class="table">
                    <?php
                    if (isset($pacienteTutor)) {
                      foreach ($pacienteTutor->result() as $row) {
                    ?>
                        <tr>
                          <td class="col-sm-2"><b>PACIENTE: </b></td>
                          <td><b><?php echo $row->nombrePaciente . "  " . $row->primerApellidoPaciente . "  " . $row->segundoApellidoPaciente; ?></b></td>
                          <tr>
                          <td><b>CÓDIGO: </b></td>
                          <td><b><?php echo $row->codigo ?></b></td>
                        </tr>
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
                <h5 class="d-flex justify-content-center"><b>VACUNAS APLICADAS</b></h5>
                <table class="table table-bordered">
                <thead >
                  <tr class="table-info">
                    <th>EDAD DE APLICACION(MESES)</th>
                    <th>VACUNA DOSIS</th>
                    <th>FECHA VACUNA</th>
                  </tr>
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
                <h5 class="d-flex justify-content-center"><b>SIGUIENTE VACUNA</b></h5>
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-info">
                      <th>EDAD DE APLICACION(MESES)</th>
                      <th>VACUNA DOSIS</th>
                      <th>FECHA SIGUIENTE DOSIS</th>
                    </tr>
                  </thead>
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
                <h5 class="d-flex justify-content-center"><b>VACUNAS PENDIENTES</b></h5>
                <table class="table table-bordered">
                  <thead>
                    <tr class="table-info">
                      <th>EDAD DE APLICACION(MESES)</th>
                      <th>VACUNA DOSIS</th>
                      <th>FECHA VACUNA</th>
                      <th>FECHA SIGUIENTE DOSIS</th>
                    </tr>
                  </thead>
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
