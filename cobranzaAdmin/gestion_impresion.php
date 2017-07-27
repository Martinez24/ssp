<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proforma | <?php echo "00".$proforma['no_factura']; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
         <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.css">
    <!-- jQuery 2.1.4 -->
    <script src="../assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--COMPONENTES PARA PLUGIN SELECT2-->
    <link rel="stylesheet" href="../assets/plugins/select2/select2.min.css">
    <script src="../assets/plugins/select2/select2.full.min.js"></script>
    <link href="../assets/plugins/pnotify/css/pnotify.custom.min.css" rel="stylesheet">
    <script src="../assets/plugins/pnotify/js/pnotify.custom.min.js"></script>
  </head>
  <body onload="window.print();">
    <div class="wrapper">
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
            <img src="../assets/img/gpa.png" width="180" class="pull-right">
            <center><h3>Grupo Plasma Automation</h3></center><br>
            <center><h5>Proforma Proyectos</h5></center>
              <h2 class="page-header">
                <i class="fa fa-file-text"></i> No. de Factura: <?php echo "00".$proforma['no_factura'];?>
                <small class="pull-right">Fecha de inicio: <?php echo $proforma['fecha_inicio'];?></small>
              </h2>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                <h4>Datos de cliente</h4>
                <address>
                <b>No. de Cliente: </b> <?php echo "CL00".$proforma['numero'] ?><br>
                <b>Nombre: </b><?php echo $proforma['nombre_cliente'];?><br>
                <b>Ciudad:</b> <?php echo $proforma['estado'].", ".$proforma['municipio'].", C.P. ".$proforma['cp']?><br>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
              <br><br>
              <b>Domicilio: </b> <?php echo $proforma['domicilio'];?><br>
              <b>RFC: </b> <?php echo $proforma['rfc'];?><br>
              
             <!-- <h5>Vendedor:</h5>
              <address>
                <b>Nombre:</b> <?php echo $venta['usuario_nombre'];?><br>
                <b>Correo Electrónico:</b><?php echo $venta['usuario_email'];?><br>-->
            </div>
            <div class="col-sm-4 invoice-col">
            <br><br>
            <address>
              <b>Correo Contacto: </b><?php echo $proforma['correo'];?><br>
              <b>Teléfono: </b><?php echo $proforma['telefono'];?><br>
              </address>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
            <address>
              <b>Vendedor: </b><?php echo $proforma['vendedor'];?><br>
              <b>Fecha entrega: </b><?php echo $proforma['fecha_entrega'];?><br>
             </address>
            </div>
            <!-- /.col -->
          </div>
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <h4>Descripción</h4>
              <address>
              <b>Serie: </b><?php echo $proforma['numero_serie']?><br>
              <b>Marca: </b><?php echo $proforma['marca'];?><br>
              <b>Modelo: </b><?php echo $proforma['modelo'];?><br>
             </address>
            </div>
          </div>
          <b>Descripción:</b><br>
           <?php echo $proforma['descripcion'];?>
          <!-- /.row -->
        </section>
        <div class="clearfix"></div>
      <footer class="main-footer">
      </footer>
    </div><!-- ./wrapper -->
    <!-- Slimscroll -->
    <script src="../assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/dist/js/demo.js"></script>
    <script src="../assets/js/jquery.selectedoption.plugin.js"></script>
    <script src="../assets/plugins/format-number/jquery.format-number.plugin.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.money').formatNumber();
      });
    </script>
  </body>
</html>
