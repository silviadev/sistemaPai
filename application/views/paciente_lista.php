<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lista de Pacientes</h1>
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
              <h3 class="card-title">Lista de Pacientes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
              echo form_open_multipart('paciente/agregar');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-xs">Agregar Paciente</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Estatura Cm.</th>
                    <th>Peso Kg.</th>
                    <th>Foto</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($paciente->result() as $row) {
                  ?>
                    <tr>
                      <td><?php echo $row->nombre; ?></th>
                      <td><?php echo $row->primerApellido; ?></td>
                      <td><?php echo $row->segundoApellido; ?></td>
                      <td><?php echo $row->fechaNacimiento; ?></td>
                      <td><?php echo $row->edad; ?></td>
                      <td><?php echo $row->sexo; ?></td>
                      <td><?php echo $row->estatura; ?></td>
                      <td><?php echo $row->peso; ?></td>
                      <td>
                        <?php
                        $foto = $row->foto;
                        if ($foto == "") {
                        ?>
                          <img width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png">
                        <?php
                        } else {
                        ?>
                          <img width="100" src="<?php echo base_url(); ?>/uploads/paciente/<?php echo $foto; ?>">
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        echo form_open_multipart('paciente/modificar');
                        ?>
                        <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">

                        <button type="submit" class="btn btn-primary btn-xs">Modificar</button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td>
                        <?php
                        echo form_open_multipart('paciente/eliminarbd');
                        ?>
                        <input type="hidden" name="idPaciente" value="<?php echo $row->idPaciente; ?>">

                        <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>
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