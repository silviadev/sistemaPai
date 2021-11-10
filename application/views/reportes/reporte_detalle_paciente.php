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

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                <div class="container">
                    <h3>Paciente</h3>
                    <table class="table">
                      <?php
                      if (isset($pacienteTutor)) {
                        foreach ($pacienteTutor->result() as $row) {
                      ?>
                          <tr>
                            <td class="col-sm-3"><b>Nombre Completo: </b></td>
                            <td><?php echo $row->nombrePaciente; ?></td>
                            <td><?php echo $row->primerApellidoPaciente; ?></td>
                            <td><?php echo $row->segundoApellidoPaciente; ?></td>
                          </tr>
                      <?php
                        }
                      }
                      echo form_close();
                      ?>
                    </table>
                  </div>
                  <div class="container">
                    <h3>Datos Tutor</h3>
                    <table class="table">
                      <?php
                      if (isset($pacienteTutor)) {
                        foreach ($pacienteTutor->result() as $row) {
                      ?>
                          <tr>
                            <td class="col-sm-3"><b>Nombre Completo: </b></td>
                            <td><?php echo $row->nombreTutor; ?></td>
                            <td><?php echo $row->primerApellidoTutor; ?></td>
                            <td><?php echo $row->segundoApellidoTutor; ?></td>
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
                  <div class="container">
                  <h3>Reporte Vacunas Aplicadas</h3>
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
                            <td><?php echo $row->nombrevia; ?></td>
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
                  <h3>Siguiente Vacuna</h3>
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
                            <td><?php echo $row->nombrevia; ?></td>
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
                  <h3>Vacunas Pendientes</h3>
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
                            <td><?php echo $row->nombrevia; ?></td>
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
  </div>
</div>