<?php

?>

<div class="content-wrapper">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col col-md-12">
        <form method="post" id="add_create" name="add_create" action="<?= site_url('vacuna/registrarBd') ?>">
          <div class="card card-primary mt-3">
            <div class="card-header">
              <div class="card-title">Registrar Vacuna</div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <label for="nombre-vacuna" class="form-label">Nombre Vacuna*</label>
                    <input id="nombre-vacuna" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre vacuna" pattern="[A-Za-z]+" required>
                  </div>
                </div>

              </div>

              <div class="form-group">
                <label for="descripcion-vacuna">Enfermedad que previene</label>
                <textarea class="form-control" id="descripcion-vacuna" name="descripcion" rows="3"></textarea>
              </div>
            </div>

            <div class="card-header">
              <div class="card-title">Agregar Dosis</div>
            </div>
            <div class="card-body">
              <div id="data-dosis"></div>
              <button type="button" class="btn btn-warning btn-sm adicional">Insertar Dosis</button>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <!-- Template para crear dosis -->
        <div class="dosis-form-template">
          <div class="row" id="row-dosis">
            <div class="col-sm">
              <div class="form-group">
                <label for="via-vacuna">Via</label>
                <select id="via-vacuna" class="form-control" name="via[]" aria-label="seleccionar por defecto">

                  <?php
                  foreach ($categoriaVia->result() as $row) {
                  ?>
                    <option value="<?php echo $row->idVia; ?>"><?php echo $row->nombre; ?></option>

                  <?php  }  ?>

                </select>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <label for="dosis-vacuna" class="form-label">Dosis *</label>
                <select id="dosis-vacuna" class="form-control" name="dosis[]" aria-label="seleccionar por defecto">
                  <?php
                  foreach ($categoriaDosis->result() as $row) {
                  ?>
                    <option value="<?php echo $row->idCategoriadosis; ?>"><?php echo $row->dosis; ?></option>

                  <?php  }  ?>
                </select>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <div class="row">
                  <label>Edad (meses)</label>
                </div>
                <div class="row">
                  <div class="col-sm m-0 h-0">
                    <input id="rango-inicial" type="number" name="rangoMesInicial[]"  min="0" class="form-control" value="0" required>
                  </div>
                  <div class="pr-1">A</div>
                  <div class="col-sm m-0 p-0">
                    <input id="rango-final" type="number" name="rangoMesFinal[]"  min="0" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <label for="cantidad-dosis" class="form-label">Cantidad ml/gotas*</label>
                <input id="cantidad-dosis" type="text" name="cantidad[]" class="form-control" placeholder="Escriba la cantidad" required>
                <small id="emailHelp" class="form-text text-muted">Cantidad 0.1 ml o 1 gota</small>
              </div>
            </div>
            <div class="col-sm col-md-auto">
              <button type="button" class="btn btn-danger btn-sm eliminar"><i class="fas fa-minus-circle"></i></button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".adicional").on("click", function() {
      $("#row-dosis").clone().appendTo("#data-dosis");
    });

    $(document).on("click", ".eliminar", function() {
      var parent = $(this).parents().get(1);
      $(parent).remove();
    });
  });
</script>