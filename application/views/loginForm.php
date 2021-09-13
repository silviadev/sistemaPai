<?php
switch ($msg) {
  case '1':
    $mensaje  = "Error de ingreso, verifique sus datos o contactese con el administrador para tener acceso";
    break;
  case '2':
    $mensaje  = "Acceso no valido";
    break;
  case '3':
    $mensaje  = "Gracias por usar el sistema";
    break;
  default:
    $mensaje  = "Ingrese sus datos"; //Regístrese para iniciar su sesión
    break;
}
?>

<div class="login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <h1>Sistema PAI</h1>
      </div>
      <div class="card-body">
        <p class="login-box-msg"><?php echo $mensaje; ?></p>

        <?php
        echo form_open_multipart('login/validarUsuario');
        ?>
        <div class="input-group mb-3">
          <input type="text" name="nombreUsuario" class="form-control" placeholder="Nombre usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="contrasena" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div> -->
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
          </div>
          <!-- /.col -->
        </div>
        <?php
        echo form_close();
        ?>
  
        <p class="mb-1">
          <a href="<?php echo base_url() ?>login/olvidoContrasena">Olvide mi contraseña</a>
        </p>
   
        <!-- <p class="mb-0">
          <a href="register.html" class="text-center">Registrar un nuevo usuario</a>
        </p> -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>