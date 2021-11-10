<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5 id="docTitle">Lista de Tutores</h5>
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
                    <th>CI</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>De alta</th>
                    <th>Fecha de registro</th>
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
                      <td><?php echo $row->ci; ?></td>
                      <td><?php echo $row->direccion; ?></td>
                      <td><?php echo $row->correo; ?></td>
                      <td><?php echo ($row->habilitado == 1) ? "Habilitado": "Deshabilitado"; ?></td>
                      <td><?php echo $row->fechaCreacion; ?></td>
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