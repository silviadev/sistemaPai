<?php
foreach ($infoPaciente->result() as $row) {
?>


  <div class="content-wrapper">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">

          <?php
          echo form_open_multipart('paciente/modificarbd');
          ?>
          <form>

            <div class="form-group">
              <label>CI del usuario tutor *</label>
              <input type="text" name="ci" class="form-control" placeholder="Escriba su numero de carnet de identidad" value="<?php echo $row->ci; ?>" required>
              <?php echo form_error('ci', '<div class="error">', '</div>')?>
            </div>

            <div class="form-group">
              <label>Nombre *</label>
              <input type="text" name="nombre" class="form-control" value="<?php echo $row->nombre; ?>" required>
              <input type="hidden" name="idPaciente" class="form-control" value="<?php echo $row->idPaciente; ?>">
            </div>

            <div class="form-group">
              <label>Primer Apellido *</label>
              <input type="text" name="primerApellido" class="form-control" value="<?php echo $row->primerApellido; ?>" required>
            </div>

            <div class="form-group">
              <label>Segundo Apellido</label>
              <input type="text" name="segundoApellido" class="form-control" value="<?php echo $row->segundoApellido; ?>">
            </div>

            <div class="form-group">
              <label>FechaNacimiento (dd/mm/yy) *</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input type="text" name="fechaNacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo $row->fechaNacimiento; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label>Sexo</label>
              <div class="form-group clearfix">
                <div class="icheck-primary d-inline">
                  <input type="radio" id="radioFemenino" name="sexo" value="femenino" <?php echo ($row->sexo == "femenino")? "checked":"" ?>>
                  <label for="radioFemenino">
                    Femenino
                  </label>
                </div>
                <div class="icheck-primary d-inline">
                  <input type="radio" id="radioMasculino" name="sexo" value="masculino" <?php echo ($row->sexo == "masculino")? "checked":"" ?>>
                  <label for="radioMasculino">
                    Masculino
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <?php
              //$foto = $row->foto;
              //if ($foto == "") {
              ?>
                <!-- <img width="100" src="<?php //echo base_url(); ?>/uploads/paciente/user_default.png"> -->
              <?php
              //} else {
              ?>
                <!-- <img width="100" src="<?php //echo base_url(); ?>/uploads/paciente/<?php //echo $foto; ?>"> -->
              <?php
              //}
              ?>
            </div>

            <!-- <div class="form-group">
              <div>
                <label>Subir Foto</label>
                <input type="hidden" name="idPaciente" value="<?php //echo $row->idPaciente; ?>" />
                <input type="file" name="userfile" >
              </div>
            </div> -->

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?php
            echo form_close();
            ?>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/adminLte/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    });

    //Money Euro
    $('[data-mask]').inputmask();
  });
</script>