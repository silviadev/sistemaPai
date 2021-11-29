<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-lg-16">
        <div class="card card-primary mt-3">
          <div class="card-header">
            <div class="card-title">Detalle Paciente</div>
          </div>
          <!-- /.card-header -->
          <div class="card-body contenido-detalle">
            <div class="form-group">
              <div class="container">
                <h5 class="d-flex justify-content-center"><b>HISTORIAL DE VACUNAS</b></h5>
           
                <div class="alert alert-light" role="alert">
                  <table class="table">
                      <?php
                      if (isset($pacienteTutor)) {
                        foreach ($pacienteTutor->result() as $row) {
                      ?>
                          <tr>
                            <td class="col-sm-2"><h5><b>PACIENTE: </b></h5></td>
                            <td><h5><?php echo $row->nombrePaciente . "  " . $row->primerApellidoPaciente . "  " . $row->segundoApellidoPaciente; ?></h5></td>
                            <tr>
                            <td><h5><b>CÓDIGO: </b></h5></td>
                            <td><h5><?php echo $row->codigo ?></h5></td>
                          </tr>
                          </tr>
                      <?php
                        }
                      }
                      ?>
                    </table>
                  </div>
                 
                <div class="row">

                  
                  <?php
                  date_default_timezone_set('America/La_Paz');
                  if (isset($pacienteDosis)) {
                    $i = 0;
                    foreach ($pacienteDosis->result() as $row) {
                      $fechaVacuna = ""; 
                      if ($row->fechaVacuna) {
                        $fechaVacuna = "<b>Vacuna administrada en fecha: </b><p> " . $row->fechaVacuna."</p>";
                      }else if(!$row->fechaVacuna && $row->fechaSiguienteDosis) {
                        $fechaVacuna = "<b>Fecha de la siguiente vacuna: </b><div> ". $row->fechaSiguienteDosis."</div>";
                      }
          
                      $alerta = "Dosis Pendiente";
                      $color = "bg-light";
                      $colorBadget= "badge badge-warning";
                      $icono = "";
                      if ($row->fechaVacuna) {
                        $color = "bg-success";
                        $alerta = "Dosis Aplicada";
                        $icono = "fas fa-check-circle";
                      }
                      else if ($row->fechaSiguienteDosis && !$row->fechaVacuna) {
                        $today = date('Y-m-d');
                        $send_date = date("Y-m-d", strtotime($row->fechaSiguienteDosis));
                        $colorBadget = "badge badge-light";
                        $color = "bg-warning";
                        $alerta = "Siguientes dosis a aplicar";
                        $icono = "fas fa-exclamation-triangle";
                        if(strtotime($today) > strtotime($send_date)) {
                          $colorBadget = "badge badge-warning";
                          $color = "bg-danger";
                          $alerta = "Dosis que no se aplicaron en fecha";
                          $icono = "fas fa-radiation-alt";
                        }
                      }
                  ?>
                    <div class="col-lg-4 col-sm-4 col-6">
                      <div class="card <?php echo $color; ?>" style="max-width: 18rem;">
                        <h5 class="card-header"><span class="<?php echo $colorBadget; ?>"><?php echo "Se aplica a los ".$row->rangoMesInicial." meses"; ?></span></h5>
                        <div class="card-body">
                          <p class="card-text"><b>Vacuna: </b><?php echo $row->nombrevacuna ?></p>
                          <p class="card-text"><b>Dosis: </b><?php echo $row->dosis . " " . $row->nombrevia ?></p>
                          <p class="card-text"><?php echo $fechaVacuna ?></p>
                          <p class="card-text" id="descripcion<?php echo  $row->idDosis; ?>" style="display: none"><?php echo $row->descripcion; ?></p>
                          
                          <!-- <button type="button" data-id="<?php echo  $row->idDosis; ?>" class="btn btn-primary btn-popup" data-toggle="modal">Mas sobre la vacuna</button> -->
                        </div>
                        <div class="card-footer">
                            <b><?php echo $alerta ?></b>
                            <i class="<?php echo $icono ?>"></i>
                        </div>
                      </div>

                      

                    </div>
                  <?php
                    }
                  }
                  echo form_close();
                  ?>
                </div> 

                <!-- Modal -->
                <div class="modal fade" id="custModal" role="dialog">
                  <div class="modal-dialog">
            
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Descripcion Vacuna</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                      </div>
                      <div class="modal-body">
            
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {

    $('.btn-popup').click(function () {
      var custId = $(this).data('id');
      var descripcion = document.getElementById("descripcion"+custId).innerText;
      $('.modal-body').html(descripcion);
      $('#custModal').modal('show');
    });

  });
</script>