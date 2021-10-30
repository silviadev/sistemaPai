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
                    <th>Seleccionar Vacuna</th>
                    <th>Fecha SiguienteVacuna vacuna</th>
                    <th>Seleccionar Siguiente Vacuna</th>
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
              if (valor.fechaVacuna)
              {
                checked = 'checked="checked"';
                disabled = 'disabled';
                disabledSiguienteDosis = 'disabled';
                //color = 'realizado';

                fechaVacuna = (valor.fechaVacuna) ? 'min="2021-01-01" max="2021-12-31" value="' + valor.fechaVacuna + '"' : "";

                console.log("fechavacuna: ", valor.fechaVacuna);

              }
              var fechaSiguienteDosisValue = "";
              var checkedSiguienteDosis = "";
              if (valor.fechaSiguienteDosis) {
                checkedSiguienteDosis = 'checked="checked"';
                disabledSiguienteDosis = 'disabled';
                fechaSiguienteDosisValue = (valor.fechaSiguienteDosis) ? 'min="2021-01-01" max="2021-12-31" value="' + valor.fechaSiguienteDosis + '"' : "";
                console.log("fechasiguienteDosis: ", valor.fechaSiguienteDosis);
              }

              tablaDosis.append(
                '<tr class="bg-color-' + color + '">' +
                '<div class="ribbon-bookmark-h bg-maroon">Sale!</div>' +
                '<td><label class="rangoInicial-'+valor.idDosis+'">' + valor.rangoMesInicial + '</label></td>' +
                '<td><label>' + valor.nombrevacuna + " " + valor.dosis + " " + valor.nombrevia + '</label></td>' +
                '<td>' +
                '<input class="form-control" type="date" step="1" name="fechavacunapacientes[' + valor.idDosis + '][]" ' + disabled + ' ' + fechaVacuna + '>' +
                '</td>' +
                '<td>' +
                  '<div class="form-check">' +
                  '<input class="form-control form-check-input check-vacuna" style="width:35%;" type="checkbox" value="' + valor.idDosis + '" name=selecteddosis[] ' + checked + ' ' + disabled + ' />' +
                  '</div>' +
                '</td>' +
                '<td>' +
                '<input class="form-control" type="date" step="1" name="fechasiguientevacunapacientes[' + valor.idDosis + '][]" ' + disabledSiguienteDosis + ' ' + fechaSiguienteDosisValue + '>' +
                '</td>' +
                '<td>' +
                  '<div class="form-check">' +
                  '<input class="form-control form-check-input check-sig-vacuna" style="width:35%;" type="checkbox" value="' + valor.idDosis + '" name=selectedsiguientedosis[] ' + checkedSiguienteDosis + ' ' + disabledSiguienteDosis + '/>' +
                  '</div>' +
                '</td>' +
                '</tr>'
              );
            });


            $(".check-vacuna").on('change', function() {
              var checked = this.checked
              var component = $("input[name*='fechavacunapacientes["+this.value+"]']");
              if (checked) {
                component.attr( "style", "background-color: orange" );
                var yourDateValue = new Date();
                var formattedDate = yourDateValue.toISOString().substr(0, 10);
                component.val(formattedDate);
              }
              else {
                component.removeAttr("style");
              }
            });

            $(".check-sig-vacuna").on('change', function() {
              var checked = this.checked
              var component = $("input[name*='fechasiguientevacunapacientes["+this.value+"]']");
              if (checked) {
                component.attr( "style", "background-color: orange" );

                var dateSrt = new Date();
                var currentMonth = dateSrt.getMonth();
                var currentDay = dateSrt.getDate();
                var valueMonth =  $(".rangoInicial-"+this.value+"").text();
                dateSrt.setMonth(currentMonth + parseInt(valueMonth), currentDay);
                var formattedDate = dateSrt.toISOString().substr(0, 10);
                component.val(formattedDate);
              }
              else {
                component.removeAttr("style");
              }
            });
          },
          error: function() {
            alert('Ocurrio un error en el servidor ..');
          }
        });
      }
    });
  });
</script>