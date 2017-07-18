<?php// include('login/validarsesion.php');?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clientes | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.css">
    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--COMPONENTES PARA PLUGIN SELECT2-->
    <link rel="stylesheet" href="assets/plugins/select2/select2.min.css">
    <script src="assets/plugins/select2/select2.full.min.js"></script>
    <link href="assets/plugins/pnotify/css/pnotify.custom.min.css" rel="stylesheet">
    <script src="assets/plugins/pnotify/js/pnotify.custom.min.js"></script>
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">

    <div class="wrapper">

      <?php
        include('header.php');
      ?>
      <!-- MENU -->
      <?php
        include('menu.php');
      ?>

      <!-- MENU -->
      <div class="content-wrapper" id="content"> 
        <section class="content-header">
          <h1>
            Clientes
            <small></small>
          </h1>
        </section>
        <section class="content">
      <div class="col-lg-12">
         <div class="row">
          <div class="panel">
            <div class="panel-heading">
            <!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="">Home</a></li>
                    <li class="active">Clientes
                   </li>
                </ol>
              </section>
<!--Termina breadcrumb.-->
<!--Aplicación de modal con Bootstrap -->
            <button class="btn btn-danger" data-toggle="modal" data-target="#miventana">Agregar Clientes</button>
            </div>
            <div class="modal fade" id="miventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4>Agregar Cliente</h4>
                  </div>
                  <div class="modal-body">
<!--Inicia formulario de agregar usuario-->
                    <section class="content">
                             <div class="row">
                              <div class="panel">
                                <div class="panel-heading"></div>
                                <div class="panel-body">
                                  <form method="post" action="clientes.php" enctype="multipart/form-data" id="form">
                      
                                    <div class="form-group">
                                      <label for="nombre">Nombre del cliente</label>
                                      <input type="text" name="nombre" required id="nombre" placeholder="Ej: Plastics S.A. de C.V." class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                      <label for="domicilio">Domicilio</label>
                                      <input type="text" name="domicilio" required id="domicilio" placeholder="Ej: Calle, No. Col" class="form-control" autofocus>
                                    </div>
                                       <!--Generando combos dinamicos-->
                                    <div class="form-group">
                                     <dd>Estado:</dd>
                                    <dd>
                                        <select class="form-control" id="estado" name="estado">
                                            <option class="form-control" value="0">Selecciona Uno...</option>
                                        </select>
                                    </dd>
                                    </div>
                                    <div class="form-group">
                                  <dd>Ciudad:</dd>
                                    <dd>
                                        <select class="form-control" id="municipio" name="municipio">
                                            <option value="0">Selecciona Uno...</option>
                                        </select>
                                    </dd>    
                                    </div>                   
                                    <!-- Termina combo dinamico-->

                                          <div class="form-group">
                                      <label for="rfc">RFC</label>
                                      <input type="text" name="rfc" required id="rfc" placeholder="Ej: ASJB828AK" class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                      <label for="Correo">Correo</label>
                                      <input type="email" name="correo" required id="correo" placeholder="Ej: Mariano@plasmaautomation.com.mx" class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                      <label for="telefono">Teléfono</label>
                                      <input type="number" name="telefono" required id="telefono" placeholder="Ej: 477-75986-89" class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                      <label for="c_p">C.P.</label>
                                      <input type="number" name="c_p" required id="c_p" placeholder="37408" class="form-control" autofocus>
                                    </div>
                                    <input type="submit" name="guardar_nuevo" value="Guardar" class="btn btn-primary">
                                  </form>
                                </div>
                              </div>
                            </div>
                        </section>
<!Termina Formulario-->
                  </div>
                </div>
              </div>
            </div>

            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>No. Cliente</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Correo</th>
                    <th>RFC</th>
                    <th>Teléfono</th>
                    <th>C.P.</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $host = 'localhost';
                  $user = 'root';
                  $password = '';
                  $bd = 'ssp';                  
                  $conexion = @mysql_connect($host, $user, $password);
                  mysql_query("SET NAMES 'utf8'");
                  @mysql_select_db($bd, $conexion);
                  $sql = "SELECT c.No_cliente as NoCliente , c.nombre as nombre, c.domicilio as Direccion, c.correo as Correo, e.id_estado, e.estado as Estado, c.id_municipio as Ciudad, c.rfc as RFC, c.telefono as Telefono, c.c_p as C_P FROM cliente c inner join estado e on e.id_estado = c.id_estado";
                  $resultado = mysql_query($sql, $conexion);
                  while ($cliente = mysql_fetch_assoc($resultado)) {
                    echo "<tr>";
                    //echo "<td><a href='clientes.php?editar_cliente_id=".$cliente['NoCliente']."' class='btn btn-rounded btn-primary editar-cliente'><i class='fa fa-pencil'></i></a></td>";
                    echo "<td><a href='clientes.php?eliminar_cliente_id=".$cliente['NoCliente']."' class='btn btn-primary eliminar-cliente'><i class='fa fa-trash eliminar-cliente'></i></a></td>";
                    echo "<td>".$cliente['NoCliente']."</td>";
                    echo "<td>".$cliente['nombre']."</td>";
                    echo "<td>".($cliente['Direccion'])."</td>";
                    echo "<td>".($cliente['Estado'])."</td>";
                    echo "<td>".($cliente['Ciudad'])."</td>";
                     echo "<td>".($cliente['Correo'])."</td>";
                    echo "<td>".($cliente['RFC'])."</td>";
                    echo "<td>".($cliente['Telefono'])."</td>";
                    echo "<td>".($cliente['C_P'])."</td>";
                    echo "</tr>";
                  }
                  function pr($var){
                    echo "<pre>";
                    print_r($var);
                    echo "</pre>";
                  }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div><!-- /.content-wrapper -->
      <footer class="main-footer">
      </footer>
    </div><!-- ./wrapper -->
    <!-- Slimscroll -->
    <script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <script src="assets/js/jquery.selectedoption.plugin.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.eliminar-cliente').click(function(evt){
          evt.preventDefault();
          var url = $(this).attr('href');          
          if(confirm("¿Estás seguro de querer eliminar este cliente?")){
            console.log(url);
            window.location.href = url;
          }
        });
      });
    </script>
    <!--Script para combos dependientes-->
    <script type="text/javascript">
$(document).ready(function(){
  cargar_estados();
  $("#estado").change(function(){dependencia_municipio();});
  $("#municipio").attr("disabled",true);
});

function cargar_estados()
{
  $.get("cargar_estado.php", function(resultado){
    if(resultado == false)
    {
      alert("Error");
    }
    else
    {
      $('#estado').append(resultado);     
    }
  }); 
}
function dependencia_municipio()
{
  var code = $("#estado").val();
  $.get("dependencia_municipio.php", { code: code },
    function(resultado)
    {
      if(resultado == false)
      {
        alert("Error");
      }
      else
      {
        $("#municipio").attr("disabled",false);
        document.getElementById("municipio").options.length=1;
        $('#municipio').append(resultado);     
      }
    }

  );
}
</script>
  </body>
</html>