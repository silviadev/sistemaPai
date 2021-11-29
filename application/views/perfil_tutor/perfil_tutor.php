<div class="content-wrapper ">
  <section>
    <div class="container p-3 text-dark">
      <div class="row justify-content-md-center">

        <?php
        if (isset($pacientes)) {
          foreach ($pacientes->result() as $row) {
            $color = ($row->sexo == "femenino") ? "background-color: pink; color: black": "background-color: blue; color: white";
        ?>
            <div class="col-md-auto">
              <a href="<?php echo base_url() ?>tutor/paciente_historial?idPaciente=<?php echo $row->idPaciente ?>" class="nav-link">
                <div class="card" style="width: 18rem; <?php echo $color ?>">
                  <div class="card-body">
                    <h5 class="card-title mb-3"><h5><b><?php echo $row->nombre . " " . $row->primerApellido . " " . $row->segundoApellido ?></b></h5></h5>
    
                    <p class="card-text"><b>Fecha de Nacimiento: </b><?php echo $row->fechaNacimiento ?></p>
                    <p class="card-text"><b>Sexo: </b><?php echo $row->sexo ?></p>
                    <p class="card-text"><b>Codigo: </b><?php echo $row->codigo ?></p>
                  </div>
                </div>
              </a>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </section>
</div>