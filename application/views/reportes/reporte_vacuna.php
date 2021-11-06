<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Reporte de vacunas</h1>
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
              <h3 class="card-title">Reporte </h3>
            </div>

            <!-- #Add custom filters in the server-side dataTable -->
            <div class="row well input-daterange">
              <div class="col-sm-4">
                <label class="control-label">Gender</label>
                <select class="form-control" name="gender" id="gender" style="height: 40px;">
                  <option value="">- Please select -</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>

              <div class="col-sm-3">
                <label class="control-label">Start date</label>
                <input class="form-control datepicker" type="date" name="initial_date" id="initial_date" placeholder="yyyy-mm-dd" style="height: 40px;" />
              </div>

              <div class="col-sm-3">
                <label class="control-label">End date</label>
                <input class="form-control datepicker" type="date" name="final_date" id="final_date" placeholder="yyyy-mm-dd" style="height: 40px;" />
              </div>

              <div class="col-sm-2">
                <button class="btn btn-success btn-block" type="submit" name="filter" id="filter" style="margin-top: 30px">
                  <i class="fa fa-filter"></i> Filter
                </button>
              </div>

              <div class="col-sm-12 text-danger" id="error_log"></div>
            </div>

            <br /><br />

            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha de nacimiento</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Codigo</th>
                    <!-- <th>Foto</th> -->
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

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