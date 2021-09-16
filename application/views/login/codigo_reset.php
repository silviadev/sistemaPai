 <div class="login-page">
   <div class="login-box">
     <!-- /.login-logo -->
     <div class="card">
       <div class="card-header text-center">
         <h1>Sistema PAI</h1>
       </div>
       <div class="card-body login-card-body">
         <p class="login-box-msg">Se requiere verificacion</p>

         <form action="<?= site_url('login/verificarCodigoReset') ?>" method="post">
           <div class="input-group mb-3">

             <input type="hidden" name="idUsuario" class="form-control" value="<?php echo $idUsuario; ?>">
             <input type="text" name="codigoReset" class="form-control" placeholder="Escribir código" required>
             <?php echo form_error('codigoReset', '<div class="error">', '</div>') ?>
           </div>
           <div class="row">
             <div class="col-12">
               <button type="submit" class="btn btn-primary btn-block">Continuar</button>
             </div>
             <!-- /.col -->
           </div>
         </form>

         <p class="mt-3 mb-1">
           <a href="<?php echo base_url() ?>login">Login</a>
         </p>
       </div>
       <!-- /.login-card-body -->
     </div>
   </div>
 </div>