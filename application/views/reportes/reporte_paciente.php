<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 id="docTitle">Lista de Pacientes</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>usuario" class="nav-link">Inicio</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Primer Apellido</th>
                      <th>Segundo Apellido</th>
                      <th>Fecha de Nacimiento</th>
                      <th>Sexo</th>
                      <th>Codigo</th>
                      <th>Tutor</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    foreach ($paciente->result() as $row) {
                    ?>
                      <tr>
                        <td><?php echo $row->nombre; ?></td>
                        <td><?php echo $row->primerApellido; ?></td>
                        <td><?php echo $row->segundoApellido; ?></td>
                        <td><?php echo $row->fechaNacimiento; ?></td>
                        <td><?php echo $row->sexo; ?></td>
                        <td><?php echo $row->codigo; ?></td>
                        <td><?php echo $row->tutor; ?></td>
                        <td>
                          <?php
                          echo form_open_multipart('reportes/verdetallepaciente');
                          ?>
                          <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">

                          <button type="submit" class="btn btn-primary btn-xs">Ver detalle</button>
                          <?php
                          echo form_close();
                          ?>
                        </td>
                      </tr>
                    <?php
                    }
                    ?>

                  </tbody>
                </table>
                <div class="modal fade" id="modal-xl">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Extra Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>One fine body&hellip;</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>