<div class="content-wrapper ">
  <section>
    <div class="container p-3 text-dark">
      <div class="row justify-content-md-center">

        <?php
        if (isset($pacientes)) {
          foreach ($pacientes->result() as $row) {
        ?>

            <div class="col-md-auto">
              <div class="card" style="width: 18rem;">
                <img class="card-img-top" width="100" src="<?php echo base_url(); ?>/uploads/paciente/user_default.png" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row->nombre . " " . $row->primerApellido . " " . $row->segundoApellido ?></h5>
                  <p class="card-text"><?php echo $row->fechaNacimiento ?></p>
                </div>
              </div>
            </div>


        <?php
          }
        }
        ?>

      </div>
    </div>
  </section>
</div>