<?php
                  $host = 'localhost';
                  $user = 'root';
                  $password = '123';
                  $bd = 'ssp';                  
                  $conexion = @mysql_connect($host, $user, $password);
                  mysql_query("SET NAMES 'utf8'");
                  @mysql_select_db($bd, $conexion);
?>
<header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>PA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Plasma</b>Automation</span>
        </a>
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="height: 50px;">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="height: 50px;">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
            <!--
              <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <i class="fa fa-bell-o">                
              </i>
              <?php 
              $sql = "SELECT id_notificacion, sum(contador) as suma from notificacion";
              $resultado = mysql_query($sql, $conexion);
              $contador = mysql_fetch_assoc($resultado);
              echo "<span class = 'label label-warning text-black'>".$contador['suma']."</span>";
              ?>
              </a>
              <ul class="dropdown-menu">
                <li class="header">Tienes Mensajes</li>
                <li>
                  <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;">
                    <ul class="menu" style="overflow: hidden; width: 100%; height: 200px">
                      <?php 
                      $sql = "SELECT pr.id_proforma, pr.no_factura as factura, n.id_notificacion as notificacion_id, n.id_proforma, n.estatus, n.contador from notificacion n inner join proforma pr on pr.id_proforma = n.id_proforma where n.estatus = 1 ";
                      $resultado = mysql_query($sql, $conexion);
                      ?>
                      <?php 
                        while($notificacion = mysql_fetch_assoc($resultado)){
                          echo "<li><a href='notificacion/consultas.php?ver_proforma_id=".$notificacion['id_proforma']."'><i class ='fa  fa-folder-o text-yellow'></i>Cobranza ha subido la profrorma 00".$notificacion['factura']."</a></li>";
                        $notificacion['notificacion_id'];
                        }
                      ?>
                    </ul>
                  </div>
                </li>
                <li class="footer">
                <a href="#">Ver todo</a>
                </li>
              </ul>
              </li>-->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 50px;">
                 <span class="hidden-xs"><?php echo "Usuario: ".$_SESSION['usuario']['nombre'];?></span>
                </a>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                     <?php echo $_SESSION['usuario']['nombre'];?>
                      <small><?php echo $_SESSION['usuario']['email'];?></small>
                    </p>
                    <h1 style="color:#ffffff;"><i class="fa fa-user"></i></h1>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="../login/sesiones.php?cerrar-sesion" class="btn btn-default btn-flat">Cerrar sesión <i class="fa fa-power-off"></i></a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>