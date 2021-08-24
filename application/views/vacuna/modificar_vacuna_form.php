<?php

function set_selected($desired_value, $new_value)
{
  if ($desired_value == $new_value) {
    echo ' selected="selected"';
  }
}

foreach ($infoVacuna as $row) {
?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-md-10">
          <form method="post" id="add_create" name="add_create" action="<?= site_url('vacuna/actualizarBd') ?>">
            <div class="card card-primary mt-3">
              <div class="card-header">
                <div class="card-title">Actualizar Vacuna</div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-sm">
                    <div class="form-group">
                      <label for="nombre-vacuna" class="form-label">Nombre Vacuna*</label>
                      <input id="nombre-vacuna" type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre vacuna" value="<?php echo $row["nombre"]; ?>" required>
                      <input type="hidden" name="idVacuna" class="form-control" value="<?php echo $row["idVacuna"]; ?>">
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <label for="descripcion-vacuna">Enfermedad que previene</label>
                  <textarea class="form-control" id="descripcion-vacuna" name="descripcion" rows="3"><?php echo $row["descripcion"]; ?></textarea>
                </div>
              </div>

              <div class="card-header">
                <div class="card-title">Actualizar Dosis</div>
              </div>
              <div class="card-body">
                <div id="data-dosis">
                  <?php
                  if (count($row["dosis"]) > 0) {
                    foreach ($row["dosis"] as $rw) {
                  ?>
                      <div class="row">
                        <input type="hidden" name="idDosis[]" class="form-control" value="<?php echo $rw->idDosis; ?>">
                        <div class="col-sm">
                          <div class="form-group">
                            <label for="via-vacuna">Via</label>
                            <select id="via-vacuna" class="form-control" name="via[]" aria-label="seleccionar por defecto">

                              <?php
                              foreach ($categoriaVia->result() as $row) {
                              ?>
                                <option value="<?php echo $row->idVia; ?>" <?php set_selected($row->idVia, $rw->idVia); ?>><?php echo $row->nombre; ?></option>

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
                                <option value="<?php echo $row->idCategoriaDosis; ?>" <?php set_selected($row->idCategoriaDosis, $rw->idCategoriaDosis); ?>><?php echo $row->dosis; ?></option>

                              <?php  }  ?>

                            </select>
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group">
                            <label for="rango-meses" class="form-label">Edad de aplicación meses*</label>
                            <input id="rango-inicial" type="number" name="rangoMesInicial[]" class="form-control" value="<?php echo $rw->rangoMesInicial; ?>" required>
                            <input id="rango-final" type="number" name="rangoMesFinal[]" class="form-control" value="<?php echo ($rw->rangoMesFinal > 0) ? $rw->rangoMesFinal : ''; ?>">
                          </div>
                        </div>
                        <div class="col-sm">
                          <div class="form-group">
                            <label for="cantidad-dosis" class="form-label">Cantidad ml/gotas*</label>
                            <input id="cantidad-dosis" type="text" name="cantidad[]" class="form-control" placeholder="Escriba la cantidad" value="<?php echo $rw->cantidad; ?>" required>
                          </div>
                        </div>
                        <div class="col-sm col-md-auto">
                          <button type="button" class="btn btn-danger btn-sm eliminar"><i class="fas fa-minus-circle"></i></button>
                        </div>
                      </div>


                  <?php
                    }
                  }
                  ?>
                </div>
                <button type="button" class="btn btn-warning btn-sm adicional">Agregar Dosis</button>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
          <!-- Template para crear dosis -->
          <div class="dosis-form-template">
            <div class="row row-dosis">
              <input type="hidden" name="idDosis[]" class="form-control" value="">
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
                      <option value="<?php echo $row->idCategoriaDosis; ?>"><?php echo $row->dosis; ?></option>

                    <?php  }  ?>
                  </select>
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="rango-meses" class="form-label">Edad de aplicación meses*</label>
                  <input id="rango-inicial" type="number" name="rangoMesInicial[]" class="form-control" required>
                  <input id="rango-final" type="number" name="rangoMesFinal[]" class="form-control">
                </div>
              </div>
              <div class="col-sm">
                <div class="form-group">
                  <label for="cantidad-dosis" class="form-label">Cantidad ml/gotas*</label>
                  <input id="cantidad-dosis" type="text" name="cantidad[]" class="form-control" placeholder="Escriba la cantidad" required>
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

<?php
}
?>

<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".adicional").on("click", function() {
      $(".row-dosis").clone().removeClass('row-dosis').appendTo("#data-dosis");
    });

    $(document).on("click", ".eliminar", function() {

      var parent = $(this).parents().get(1);
      var idDosisEliminado = $(parent).children("input[type='hidden']");
      if (idDosisEliminado.val() !== "") {
        $('<input type="hidden" name="idDosisEliminar[]" class="form-control">').val(idDosisEliminado.val()).appendTo("#data-dosis");
      }
      $(parent).remove();
    });
  });
</script>