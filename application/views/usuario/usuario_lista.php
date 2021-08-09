<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lista de Usuarios</h1>
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
              <h3 class="card-title">Lista de usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
              echo form_open_multipart('usuario/agregar');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-xs">Agregar Usuario</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>primer Apellido</th>
                    <th>segundo Apellido</th>
                    <th>Direccion</th>
                    <th>Tipo de usuario</th>
                    <th>Correo</th>
                    <th>De alta</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($usuario->result() as $row) {
                  ?>
                    <tr>
                      <td><?php echo $row->nombre; ?></th>
                      <td><?php echo $row->primerApellido; ?></td>
                      <td><?php echo $row->segundoApellido; ?></td>
                      <td><?php echo $row->direccion; ?></td>
                      <td><?php echo $row->tipoUsuario; ?></td>
                      <td><?php echo $row->correo; ?></td>
                      <td><?php echo $row->habilitado; ?></td>
                      <td>
                        <?php
                        echo form_open_multipart('Usuario/modificar');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">

                        <button type="submit" class="btn btn-primary btn-xs">Actualizar</button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td>
                        <?php
                        echo form_open_multipart('Usuario/eliminarbd');
                        ?>
                        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">

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