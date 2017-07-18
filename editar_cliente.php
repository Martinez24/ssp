  <?php //include('login/validarsesion.php');?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar | Cliente</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
            Editar
            <small>cliente</small>
          </h1>
        </section>
<!--Breadcrumb -->
              <section class="content-header">
                <ol class="breadcrumb">
                   <i class="fa fa-dashboard"></i>
                    <li><a href="">Home</a></li>
                    <li>AB Clientes</li>
                    <li class="active">Editar Cliente</li>
                </ol>
              </section>
<!--Termina breadcrumb.-->
        <section class="content">
          <div class="col-lg-6">
             <div class="row">
              <div class="panel">
                <div class="panel-heading"></div>
                <div class="panel-body">
                  <form method="post" action="clientes.php" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="NoCliente" value="<?php echo $cliente['NoCliente'];?>">

                    <div class="form-group">
                      <label for="No_Cliente">Número del Cliente: </label><br>
                        <?php echo $cliente['No_Cliente'];?>
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombre del cliente</label>
                      <input type="text" name="nombre" required id="nombre" placeholder="Ej: Plasticos S.A. de C.V." class="form-control" value="<?php echo $cliente['nombre'];?>" autofocus>
                    </div>
                     <div class="form-group">
                      <label for="domicilio">Domicilio</label>
                      <input type="text" name="domicilio" required id="domicilio" placeholder="Ej: Calle, No. Col" class="form-control" value="<?php echo $cliente['domicilio'];?>" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="rfc">RFC</label>
                      <input type="text" name="rfc" required id="rfc" placeholder="Ej: FGA789O" class="form-control" value="<?php echo $cliente['rfc'];?>" autofocus>
                    </div> 
                     <div class="form-group">
                      <label for="correo">Correo eléctronico</label>
                      <input type="email" name="correo" required id="correo" placeholder="Ej: juanito@plasmaautomation.com.mx" class="form-control" value="<?php echo $cliente['correo'];?>" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="telefono">Teléfono</label>
                      <input type="number" name="telefono" required id="telefono" placeholder="Ej: 477-789-87-53" class="form-control" value="<?php echo $cliente['telefono'];?>">
                    </div>
                    <div class="form-group">
                      <label for="c_p">Correo Postal</label>
                      <input type="number" name="c_p" required id="c_p" placeholder="Ej: 47896" class="form-control" value="<?php echo $cliente['c_p'];?>">
                    </div>
                    <input type="submit" name="guardar_edicion" value="Guardar" class="btn btn-primary">
                  </form>
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
    <script src="assets/js/parsley.js"></script>
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
