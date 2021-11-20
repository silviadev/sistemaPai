<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-10">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Detalle Paciente</div>
          </div>
          <?php
          echo form_open_multipart('reportes/imprimir_tutor_paciente');
          ?>
          <div class="p-3">
            <input type="hidden" name="idUsuario" value="<?php echo $idUsuario?>">
            <button class="btn btn-primary" id="pdf">PDF</button>
          </div>
      
          <?php
            echo form_close();
          ?>
          <!-- /.card-header -->
          <div class="card-body contenido-detalle">
            <div class="container text-center">
              <h5><b>REPORTE TUTOR Y PACIENTES</b></h5>
            </div>
            <div class="form-group">
              <div class="container border">
                <h5><b>INFORMACION TUTOR</b></h5>
                <div class="container">
                  <table class="table">
                    <?php
                    if (isset($usuario)) {
                      foreach ($usuario->result() as $row) {
                    ?>
                        <tr>
                          <td class="col-sm-2"><b>TUTOR:</b></td>
                          <td><b><?php echo $row->nombre." ".$row->primerApellido." ".$row->segundoApellido; ?></b></td>
                        </tr>
                        <tr>
                          <td><b>CI: </b></td>
                          <td><b><?php echo $row->ci ?></b></td>
                        </tr>
                        <tr>
                          <td class="col-sm-2"><b>DIRECCION:</b></td>
                          <td><b><?php echo $row->direccion; ?></b></td>
                        </tr>
                        <tr>
                          <td class="col-sm-2"><b>CORREO:</b></td>
                          <td><b><?php echo $row->correo; ?></b></td>
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
                <h5 class="d-flex justify-content-center"><b>PACIENTES</b></h5>
                <table class="table table-bordered">
                <thead >
                  <tr class="table-info">
                    <th>NOMBRE</th>
                    <th>APELLIDO PATERNO</th>
                    <th>APELLIDO MATERNO</th>
                    <th>CODIGO</th>
                    <th>SEXO</th>
                    <th>FECHA DE NACIMIENTO</th>
                    <th>FECHA DE REGISTRO</th>
                  </tr>
                  <?php
                  if (isset($pacientes)) {
                    foreach ($pacientes->result() as $row) {
                  ?>
                        <tr class="bg-color-' + color + '">
                          <td><?php echo $row->nombre; ?></td>
                          <td><?php echo $row->primerApellido?></td>
                          <td><?php echo $row->segundoApellido; ?></td>
                          <td><?php echo $row->codigo; ?></td>
                          <td><?php echo $row->sexo; ?></td>
                          <td><?php echo $row->fechaNacimiento; ?></td>
                          <td><?php echo $row->fechaCreacion; ?></td>
                        </tr>
                  <?php
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
