

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Almacen Yuyita | Log in</title>
<link rel="stylesheet" href="<?php echo RUTA_URL;?>/public/plugins/fontawesome-free/css/all.min.css"> 
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
<link rel="stylesheet" href="<?php echo RUTA_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 

<link rel="stylesheet" href="<?php echo RUTA_URL;?>/public/css/adminlte.min.css?v=3.2.0">
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<a href="<?php echo RUTA_URL;?>/index2.html"><b>ALMACEN</b>YUYITOS</a>
</div>
<form class="login-form validate-form" id="formLogin" action="login" method="post">
<div class="card">
<div class="card-body login-card-body">
<p class="login-box-msg">Inicio de sesion</p>
<form action="<?php echo RUTA_URL;?>/index3.html" method="post">
<div class="input-group mb-3">
<input type="email" class="form-control"  id="correo_usuario" name="correo_usuario" placeholder="Correo">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="password" class="form-control" id="contrasena_usuario" name="contrasena_usuario"  placeholder="Contrasena">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<!-- validacion si existe la sesion error login  -->
                <?php if(isset($_SESSION['error_login'])): ?>
                        <div class="alerta-registrar" >
				            <?=$_SESSION['error_login'];?>
			            </div>
		        <?php endif; ?>

<div class="col-4">
<button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
</div>

</div>
</form>



</div>
</div>
</form>

<script src="<?php echo RUTA_URL;?>/public/plugins/jquery/jquery.min.js"></script>

<script src="<?php echo RUTA_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo RUTA_URL;?>/public/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
