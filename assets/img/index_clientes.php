<!DOCTYPE html>
<!-- saved from url=(0039)http://localhost/ssp/index_usuarios.php -->
<html lang="es"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Usuarios | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="./index_clientes_files/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./index_clientes_files/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./index_clientes_files/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./index_clientes_files/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="./index_clientes_files/_all-skins.css">
    <!-- jQuery 2.1.4 -->
    <script src="./index_clientes_files/jQuery-2.1.4.min.js.descarga"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="./index_clientes_files/bootstrap.min.js.descarga"></script>
    <link rel="shortcut icon" href="http://localhost/ssp/assets/img/favicon.ico" type="image/x-icon">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--COMPONENTES PARA PLUGIN SELECT2-->
    <link rel="stylesheet" href="./index_clientes_files/select2.min.css">
    <script src="./index_clientes_files/select2.full.min.js.descarga"></script>
    <link href="./index_clientes_files/pnotify.custom.min.css" rel="stylesheet">
    <script src="./index_clientes_files/pnotify.custom.min.js.descarga"></script>
  </head>
  <body class="skin-blue-light sidebar-mini">

    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="http://localhost/ssp/index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>PA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Plasma</b>Automation</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation" style="height: 50px;">
          <!-- Sidebar toggle button-->
          <a href="http://localhost/ssp/index_usuarios.php#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="height: 50px;">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                     
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
               <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 50px;">
                 <span class="hidden-xs"><br />
<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\xampp2.1\htdocs\ssp\header.php</b> on line <b>21</b><br />
</span>-->
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                     <!-- <br />
<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\xampp2.1\htdocs\ssp\header.php</b> on line <b>27</b><br />
                      <small><br />
<b>Notice</b>:  Undefined variable: _SESSION in <b>C:\xampp2.1\htdocs\ssp\header.php</b> on line <b>28</b><br />
</small>-->
                    </p>
                    <h1 style="color:#ffffff;"><i class="fa fa-user"></i></h1>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                    </div>
                    <div class="pull-right">
                      <a href="http://localhost/ssp/login/sesiones.php?cerrar-sesion" class="btn btn-default btn-flat">Cerrar sesión <i class="fa fa-power-off"></i></a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>      <!-- MENU -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="height: auto;">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENÚ PRINCIPAL</li>
            <li>
              <a href="http://localhost/ssp/index.php">
                <i class="fa fa-home"></i> 
                <span>Inicio</span>
              </a>
            </li>
            <li class="treeview">
                <ul class="treeview-menu">
   
              </ul>
              </li><li>
              <a href="http://localhost/ssp/index_cliente.php">
                <i class="fa fa-suitcase"></i>
                <span>Clientes</span>
              </a>
            </li>
            
            <li class="treeview">
              <a href="http://localhost/ssp/index_usuarios.php">
                <i class="fa fa-users"></i> <span>Usuarios</span>
              </a>
            </li>
            <li>
              <a href="http://localhost/ssp/index_proyecto.php">
                <i class="fa  fa-gear"></i>
                <span>Proyectos</span>
              </a>
            </li>
           <li>
              <a href="http://localhost/ssp/index_vendedor.php">
                <i class="fa fa-user"></i> 
                <span>Vendedores</span>
              </a>
            </li>
            <li>
              <a href="http://localhost/ssp/index_usuarios.php">
                <i class="fa fa-file-powerpoint-o"></i>
                <span>Consultar Proforma</span>
              </a>
            </li>
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- MENU -->
      <div class="content-wrapper" id="content" style="min-height: 604px;"> 
        <section class="content-header">
          <h1>
            Usuarios
            <small></small>
          </h1>
        </section>
        <section class="content">
      <div class="col-lg-12">
         <div class="row">
          <div class="panel">
            <div class="panel-heading">
<!--Aplicación de modal con Bootstrap -->
            <button class="btn btn-danger" data-toggle="modal" data-target="#miventana">Agregar usuario</button>
<!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="http://localhost/ssp/index_usuarios.php">Home</a></li>
                    <li class="active">Usuarios
                   </li>
                </ol>
              </section>
<!--Termina breadcrumb.-->
            </div>
            <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                    <h4>Agregar Usuario</h4>
                  </div>
                  <div class="modal-body">
<!--Inicia formulario de agregar usuario-->
                    <section class="content">
                             <div class="row">
                              <div class="panel">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                  <form method="post" action="http://localhost/ssp/usuarios.php" enctype="multipart/form-data" id="form">
                                    <div class="form-group">
                                      <label for="nombre">Nombre</label>
                                      <input type="text" name="nombre" required="" id="nombre" placeholder="Ej: Juan" class="form-control" autofocus="">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Correo Electrónico</label>
                                      <input type="email" name="email" required="" id="email" placeholder="Ej: juan@gmail.com" class="form-control">
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Tipo de Usuario</label>
                                      <select name="tipo_usuario" required="" class="form-control">
                                        <option value="ADMIN">Administrador</option>
                                        <option value="USUARIO">Usuario</option>
                                        <option value="DIR">Director</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="password">Contraseña</label>
                                      <input type="password" name="password" required="" id="password" class="form-control">
                                    </div>
                                    <input type="submit" name="guardar_nuevo" value="Guardar" class="btn btn-primary">
                                  </form>
                                </div>
                              </div>
                            </div>
                        </section>
                         </div>
                </div>
              </div>
            </div>
<!--Termina Formulario-->
<!--Modal para editar usuario-->
      
<!--Termina Modal de editar usuario-->                 
            <!--Panel de consulta de usuarios-->
            <div class="panel panel-info">
              <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Tipo de Usuario</th>
                    <th>Creado</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody>
                <tr><td><a href="http://localhost/ssp/usuarios.php?editar_usuario_id=15" class="btn btn-rounded btn-primary editar-usuario"><i class="fa fa-pencil"></i></a></td><td><a href="http://localhost/ssp/usuarios.php?eliminar_usuario_id=15" class="btn btn-primary eliminar-usuario"><i class="fa fa-trash eliminar-usuario"></i></a></td><td>Jose Antonio Sosa</td><td>sosa@plasmaautomation.com.mx</td><td>Administrador</td><td>2017-07-17</td><td>Activo</td></tr>                </tbody>
              </table>
              </div>
              <div class="panel-footer">Sistemas GPA</div>
              </div>
            </div>
          </div>
        </div>
      </section></div>
    
    <div class="clearfix"></div>
  </div><!-- /.content-wrapper -->
      <footer class="main-footer">
      </footer>
    <!-- ./wrapper -->
    <!-- Slimscroll -->
    <script src="./index_clientes_files/jquery.slimscroll.min.js.descarga"></script>
    <!-- FastClick -->
    <script src="./index_clientes_files/fastclick.min.js.descarga"></script>
    <!-- AdminLTE App -->
    <script src="./index_clientes_files/app.min.js.descarga"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./index_clientes_files/demo.js.descarga"></script>
    <script src="./index_clientes_files/jquery.selectedoption.plugin.js.descarga"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.eliminar-usuario').click(function(evt){
          evt.preventDefault();
          var url = $(this).attr('href');          
          if(confirm("¿Estás seguro de querer eliminar este usuario?")){
            console.log(url);
            window.location.href = url;
          }
        });
      });
    </script>
  

</body></html>