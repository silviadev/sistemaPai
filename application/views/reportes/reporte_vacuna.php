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
            <div class="card-body">
              <!-- #Add custom filters in the server-side dataTable -->
              <div class="row well input-daterange">
                <div class="col-sm-3">
                  <label class="control-label">Fecha vacuna inicio</label>
                  <input class="form-control datepicker" type="date" name="initial_date" id="min" placeholder="yyyy-mm-dd" style="height: 40px;" />
                </div>

                <div class="col-sm-3">
                  <label class="control-label">Fecha vacuna final</label>
                  <input class="form-control datepicker" type="date" name="final_date" id="max" placeholder="yyyy-mm-dd" style="height: 40px;" />
                </div>

                <div class="col-sm-2">
                  <button class="btn btn-success btn-block" type="button" name="filter" id="filter-button" style="margin-top: 30px">
                    <i class="fa fa-filter"></i> Buscar
                  </button>
                </div>
                <div class="col-sm-12 text-danger" id="error_log"></div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <label class="control-label">Vacuna</label>
                  <input class="form-control" type="text" name="vacuna"/>
                </div>
                <div class="col-sm-2">
                  <label class="control-label">Paciente</label>
                  <input class="form-control" type="text" name="codigo"/>
                </div>
                <div class="col-sm-2">
                  <label class="control-label">Código Paciente</label>
                  <input class="form-control" type="text" name="codigo"/>
                </div>
              </div>

              <br /><br />

              <!-- /.card-header -->

              <table id="datatable_vacuna" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>VACUNA</th>
                    <th>DOSIS</th>
                    <th>EDAD DE APLICACIÓN (MESES)</th>
                    <th>PACIENTE</th>
                    <th>FECHA REGISTRO VACUNA</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  foreach ($pacienteVacunas->result() as $row) {
                  ?>
                    <tr>
                      <td><?php echo $row->nombreVacuna; ?></td>
                      <td><?php echo $row->dosis; ?></td>
                      <td><?php echo $row->rangoMesInicial; ?></td>
                      <td><?php echo $row->nombrePaciente; ?></th>
                      <td><?php echo $row->fechaVacuna; ?></td>
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


<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/js/custom.js"></script>

<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery-ui/jquery-ui.min.js"></script>
 
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/datatables-searchbuilder/js/dataTables.searchBuilder.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/moment/moment.min.js"></script>

<script type="text/javascript">
  /* load_data(); // first load

  function load_data(initial_date, final_date, gender) {
    var ajax_url = '<?= base_url() ?>reportes/buscarvacuna'; //"jquery-ajax.php";
    $('#datatable_vacuna').DataTable({
      "order": [],
      dom: 'Blfrtip', // Add the Copy, Print and export to CSV, Excel and PDF buttons
      buttons: [
        'copy', 'csv', 'excel', 'pdf'
      ],
      "processing": true,
      "serverSide": true,
      "stateSave": true, // #Save the state of filters and entries
      "lengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "All"]
      ], // #Display all records in server-side dataTable
      "ajax": {
        "url": ajax_url,
        "dataType": "json",
        "type": "POST",
        "data": {
          "action": "fetch_vacunas",
          "initial_date": initial_date,
          "final_date": final_date,
          "gender": gender
        },
        "dataSrc": "records"
      },
      "columns": [{
          "data": "idPaciente"
        },
        {
          "data": "idDosis"
        },
        {
          "data": "idSiguienteDosis"
        },
        {
          "data": "fechaVacuna"
        }
      ]
    });
  }

  $("#filter").click(function() {
    var initial_date = $("#initial_date").val();
    var final_date = $("#final_date").val();
    var gender = ""; //$("#gender").val();

    if (initial_date == '' && final_date == '') {
      //$('#datatable_vacuna').DataTable().destroy();
      $('#datatable_vacuna').dataTable({
        "destroy": true,
        "searching": false,
        "lengthMenu": false,
        "retrieve": true,
      });
      load_data("", "", gender); // filter immortalize only
    } else {
      var date1 = new Date(initial_date);
      var date2 = new Date(final_date);
      var diffTime = Math.abs(date2 - date1);
      var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

      if (initial_date == '' || final_date == '') {
        $("#error_log").html("Warning: You must select both (start and end) date.</span>");
      } else {
        if (date1 > date2) {
          $("#error_log").html("Warning: End date should be greater then start date.");
        } else {
          //$("#error_log").html(""); 
          //$('#datatable_vacuna').DataTable().destroy();
          $('#datatable_vacuna').dataTable({
            "destroy": true,
            "searching": false,
            "lengthMenu": false,
            "retrieve": true,
          });
          load_data(initial_date, final_date, gender);
        }
      }
    }
  }); */
  /* var table = $('#datatable_vacuna').dataTable();
 
      // Add event listeners to the two range filtering inputs
      $('#fini').keyup( function() { table.draw(); } );
      $('#ffin').keyup( function() { table.draw(); } ); */

 /*  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min_date = document.getElementById("min").value;
      var min = new Date(min_date);
      var max_date = document.getElementById("max").value;
      var max = new Date(max_date);

      var startDate = new Date(data[1]);
      //window.confirm(startDate);
      if (!min_date && !max_date) {
        return true;
      }
      if (!min_date && startDate <= max) {
        return true;
      }
      if (!max_date && startDate >= min) {
        return true;
      }
      if (startDate <= max && startDate >= min) {
        return true;
      }
      
      return false;
    }
  ); */

  $.fn.dataTable.ext.search.push(function( settings, data, dataIndex ) {                 
        var dateStart = moment(from,"DD/MM/YYYY");
        var dateEnd = moment(to,"DD/MM/YYYY");

        var evalDate= moment(data[num],"DD/MM/YYYY");
        console.log("dateStart +"+dateStart+" dateEnd "+dateEnd);

        if (evalDate >= dateStart && evalDate <= dateEnd) {
            return true;
        }
        else {
            return false;
        }
    });

  var table = $('#datatable_vacuna').DataTable();

  // Event listener to the two range filtering inputs to redraw on input
  $('#filter-button').on("click", function() {
    table.draw();
  });
</script>