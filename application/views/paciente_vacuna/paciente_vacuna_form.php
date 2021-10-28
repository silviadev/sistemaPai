<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-10">

        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Paciente vacuna</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">

            <?php
              echo form_open_multipart('pacientevacuna/registrarPacienteVacuna');
            ?>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Paciente</label>
                  <select class="select-paciente-ajax form-control select2bs4" style="width: 100%;" name="paciente">
                    <option></option>
                    <?php
                    foreach ($pacienteCodigo->result() as $row) {
                      $codigo = $row->codigo;
                    ?>
                      <option value="<?php echo $row->idPaciente; ?>"><?php echo $row->nombre . " " . $row->primerApellido . " " . $row->segundoApellido . " - " . $codigo; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="table-responsive-sm">
              <table class="table table-sm table-bordered">
                <thead class="vacuna-cabecera">
                  <tr>
                    <th>Edad de aplicación (Meses)</th>
                    <th>Vacuna</th>
                    <th>Fecha vacuna</th>
                    <th>Seleccionar vacuna</th>
                    <th>SiguienteVacuna vacuna</th>
                    <th>Fecha siguiente Vacuna</th>
                  </tr>
                </thead>
                <tbody id="tabla-vacunas">

                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </div>
            <?php
              echo form_close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>/adminLte/plugins/moment/moment.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    
    $('.select-paciente-ajax').on('change', function() {
      var idPaciente = $(".select-paciente-ajax option:selected").val();
      console.log(idPaciente);
      //<td class="prova" data-ribbon="✅"></td>
      var tablaDosis = $("tbody");

      if (idPaciente != '') {
        $.ajax({
          data: {
            idPaciente: idPaciente
          },
          url: '<?= base_url() ?>pacientevacuna/buscarDosisPaciente',
          type: 'POST',
          dataType: 'json',
          success: function(r) {
            console.log("jasdkfjaklsd", r);
            tablaDosis.find('tr').remove();

            $(r).each(function(indice, valor) {
              var color = valor.rangoMesInicial;
              var checked = "";
              var disabled = "";
              var fechaVacuna = "";
              var disabledSiguienteDosis = "";
              if (valor.rangoMesInicial == "0") {
                disabledSiguienteDosis = 'disabled';
              }
              if (valor.fechaVacuna)//idPacienteVacuna
              {
                checked = 'checked="checked"';
                disabled = 'disabled';
                disabledSiguienteDosis = 'disabled';
                color = 'realizado';
                fechaVacuna = valor.fechaVacuna.replace(/^(\d{4})-(\d{2})-(\d{2})/, '$2/$3/$1');
                
              }
              var fechaSiguienteDosis = "";
              var checkedSiguienteDosis = "";
              if (valor.fechaSiguienteDosis) {
                checkedSiguienteDosis = 'checked="checked"';
                disabledSiguienteDosis = 'disabled';
                fechaSiguienteDosis = valor.fechaSiguienteDosis.replace(/^(\d{4})-(\d{2})-(\d{2})/, '$2/$3/$1');
              }

              tablaDosis.append(
                '<tr class="bg-color-' + color + '">' +
                '<div class="ribbon-bookmark-h bg-maroon">Sale!</div>'+
                '<td><label>' + valor.rangoMesInicial + '</label></td>' +
                '<td><label>' + valor.nombrevacuna + " " + valor.dosis + " " + valor.nombrevia + '</label></td>' +
                '<td>' +

                  '<div class="input-group date reservationdate" id="fechavacuna' + valor.idDosis + '" data-target-input="nearest">' +
                  '<input type="text" class="form-control datetimepicker-input" data-target="#fechavacuna' + valor.idDosis + '" name="fechavacunapacientes['+valor.idDosis+'][]" ' + disabled + ' value="'+fechaVacuna+'" />' +
                  '<div class="input-group-append" data-target="#fechavacuna' + valor.idDosis + '" data-toggle="datetimepicker">' +
                  '<div class="input-group-text"><i class="fa fa-calendar"></i></div>' +
                  '</div>' +
                  '</div>' +

                '</td>' +
                '<td>' +
                  '<div class="form-check">' +
                  '<input class="form-control form-check-input" type="checkbox" value="' + valor.idDosis + '" name=selecteddosis[] ' + checked + ' ' + disabled + ' />' +
                  '</div>' +
                '</td>' +
                '<td>' +

                  '<div class="input-group date reservationdate" id="fechasiguientevacuna' + valor.idDosis + '" data-target-input="nearest">' +
                  '<input type="text" class="form-control datetimepicker-input" data-target="#fechasiguientevacuna' + valor.idDosis + '" name="fechasiguientevacunapacientes['+valor.idDosis+'][]" ' + disabledSiguienteDosis + ' value="'+fechaSiguienteDosis+'" />' +
                  '<div class="input-group-append" data-target="#fechasiguientevacuna' + valor.idDosis + '" data-toggle="datetimepicker">' +
                  '<div class="input-group-text"><i class="fa fa-calendar"></i></div>' +
                  '</div>' +
                  '</div>' +

                '</td>' +
                '<td>' +
                  '<div class="form-check">' +
                  '<input class="form-control form-check-input" type="checkbox" value="' + valor.idDosis + '" name=selectedsiguientedosis[] ' + checkedSiguienteDosis + ' ' + disabledSiguienteDosis + '/>' +
                  '</div>' +
                '</td>' +
                '</tr>'
              );
            });

            $('.reservationdate').datetimepicker({
              format: 'L'
            });
            //pacientes.prop('disabled', false);
          },
          error: function() {
            alert('Ocurrio un error en el servidor ..');
          }
        });
      }
    });
    
  });
</script>
