<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">

      <?php 
    if(isset( $_SESSION['administrador'])){
      ?>
      <h4>Hola,
      <?=  strtolower(substr($_SESSION['administrador']['nombre_usuario'], 0, 20)."....")?>
      </h4>
    <?php
    }else if(isset($_SESSION['sololectura'])){
      ?>
      <h4>Hola,
      <?=  strtolower(substr($_SESSION['sololectura']['nombre_usuario'], 0, 20)."....")?>
      </h4>
    <?php
    }?>

          <li class="nav-item">   
            <a href="<?php echo RUTA_URL; ?>/usuarios/logout" class="nav-link">
              <p>
                Cerrar sesion
              </p>
            </a>
          </li>

    </div>
  </aside>