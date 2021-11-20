<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Vacuna</h5>
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
            <div class="card-body">
              <?php
              echo form_open_multipart('vacuna/agregar');
              ?>
              <div class="form-group">
                <button type="submit" class="btn btn-secondary btn-xs">Agregar Vacuna</button>
              </div>
              <?php
              echo form_close();
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NOMBRE VACUNA</th>
                    <th>ENFERMEDAD QUE PREVIENE</th>
                    <th>VIA</th>
                    <th>EDAD DE APLICACION</th>
                    <th>DOSIS Y CANTIDAD</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($vacuna as $row) {

                  ?>
                    <tr>
                      <td><?php echo $row["nombre"]; ?></th>
                      <td><?php echo $row["descripcion"]; ?></td>
                      <td>
                        <?php
                        foreach ($row["dosis"] as $rw) {
                          echo '<div class="row">'.$rw->viaNombre.'</div>';
                          echo '<hr width=100%>';
                        }
                        ?>
                      </td>
                      <td><?php
                        foreach ($row["dosis"] as $rw) {
                          $mesFinal = ($rw->rangoMesFinal > 0) ? ' a '.$rw->rangoMesFinal: "";
                          echo '<div class="row">'.$rw->dosisNombre.' de '.$rw->rangoMesInicial.$mesFinal.' meses'.'</div>';
                          echo '<hr width=100%>';
                        }
                        ?></td>
                      <td><?php
                        foreach ($row["dosis"] as $rw) {
                          echo '<div class="row">'.$rw->cantidad.'</div>';
                          echo '<hr width=100%>';
                        }
                        ?>

                        </td>
                      <td>
                        <?php
                        echo form_open_multipart('vacuna/modificar');
                        ?>
                        <input type="hidden" name="idVacuna" value="<?php echo $row["idVacuna"];  ?>">

                        <button type="submit" class="btn btn-primary btn-xs"><i class="far fa-edit"></i></button>
                        <?php
                        echo form_close();
                        ?>
                      </td>
                      <td>
                        <?php
                        echo form_open_multipart('vacuna/eliminarbd');
                        ?>
                        <input type="hidden" name="idVacuna" value="<?php echo $row['idVacuna']; ?>">
                        <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></button>
                        <?php
                        foreach ($row["dosis"] as $rw) {
                          echo '<input type="hidden" name="idDosis[]" value="'.$rw->idDosis.'">';
                        }
                        ?>
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