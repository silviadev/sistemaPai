<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-lg-end">
        
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
            <div class="row justify-content-md-center m-3">
              <h3 id="title"><b>PACIENTES REGISTRADOS</b></h3>
            </div>
            <div class="card-header">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="paciente-table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Primer Apellido</th>
                      <th>Segundo Apellido</th>
                      <th>Código</th>
                      <th>Fecha de Nacimiento</th>
                      <th>Sexo</th>
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
                        <td><?php echo $row->codigo; ?></td>
                        <td><?php echo $row->fechaNacimiento; ?></td>
                        <td><?php echo $row->sexo; ?></td>
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
  <input id="usuario" type="hidden" value="<?php echo  $nombre . " " . $primerApellido . " " . $segundoApellido;?>"/>
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

<script type="text/javascript">
  var autor = $('#usuario').val();
  var tituloReporte = "Reporte de " + $('#title').text();
  $("#paciente-table").DataTable({
    dom: 'Bfrtip',
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "searching": true,
    "retrieve": true,
    "language": getLanguaje(),
    
    "buttons": [{
      extend: 'pdfHtml5',
      title: tituloReporte.toUpperCase(),
      bom: true,
      pageSize: "LETTER",
      exportOptions: {
        columns: [ 0, 1, 2, 3, 4, 5, 6 ]
     },
      customize: function ( doc ) {
        doc.content.splice( 0, 0, obtenerImagenCabecera() );
        var today = getDate()
        var objFooter = {};
        objFooter['alignment'] = 'center';
        doc['footer'] = function(currentPage, pageCount) {
          var footer = [
            {
              alignment: 'left',
              stack: [
                {
                  text: 'Autor: ' + autor,
                  color: 'grey',
                  alignment: 'left',
                  margin:[20, 5, 0, 0]
                },
                {
                  text: today,
                  color: 'grey',
                  fontSize: 8,
                  alignment: 'left',
                  margin:[20, 2, 0, 0]
                }
              ]
            },
            {
              stack: [
                {
                  text: 'Pagina ' + currentPage + " de " + pageCount,
                  alignment: 'right',
                  color: 'grey',
                  fontSize: 8,
                  margin:[0, 2, 20, 0]
                }
              ]
            }
          ];
          objFooter['columns'] = footer;
          return objFooter;
        };
      }
    }]
  }).buttons().container().appendTo('#paciente-table_filter .col-sm-6:eq(0)'); 

  function getDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd < 10){
        dd = '0' + dd
    }
    if(mm < 10){
        mm = '0' + mm
    }
    return dd + '/' + mm + '/' + yyyy;
  }

  function obtenerImagenCabecera() {
    return {
      margin: [ 0, 0, 0, 12 ],
      alignment: 'right',
      width: 200,
      image: 'data:image/png;base64,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'
    }
  }
</script>