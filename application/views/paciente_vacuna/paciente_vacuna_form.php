<div class="content-wrapper">
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>CI tutor</label>
          <select class="form-control select2bs4" style="width: 100%;">
           <!--  <option selected="selected">Alabama</option> -->
            <?php
            foreach ($usuario->result() as $row) {
            ?>
              <option value="<?php echo $row->idUsuario; ?>"><?php echo $row->nombre."(".$row->ci.")"; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Dosis</label>
          <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="form-group">
          <label>Paciente</label>
          <select class="form-control select2bs4" style="width: 100%;">
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>

        <div class="form-group">
          <label>Siguiente dosis</label>
          <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
          </select>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Fecha proxima vacuna:</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</div>
</div>