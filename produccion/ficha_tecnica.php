<?php 

$host = 'localhost';
$user = 'root';
$password = '123';
$bd = 'ssp';
$conexion = @mysql_connect($host, $user, $password);
@mysql_select_db($bd, $conexion);

if ($_POST['agrega-motor']) {
    	extract($_POST);
        $gestion['cantidad'] = $cantidad_m;
        $gestion['motor'] = $motor;
        $gestion['observacion'] = $observacion_m;
        $gestion['ejes'] = $no_ejes;
        $tarea['gestiones'][] = $gestion;
        $_SESSION['tarea']= $tarea; 
        header("Location: index_ficha.php");
    }

 if(isset($_POST['agrega_ficha'])){
       extract($_POST);
       //Insercción de tipo de servicio
        $sql = "INSERT INTO servicio(cantidad, servicio, modelo, descripcion) VALUES('$cantidad', '$servicio', '$modelo', '$descripcion')";
        $resultado = mysql_query($sql, $conexion);    
        //Insercción de Sistema de corte 
        $sql1 = "INSERT INTO sistema(cantidad_s, sistema, modelo_s, voltaje, observacion) VALUES('$cantidad_s', '$sistema', '$modelo_s', '$voltaje', '$observacion')";
        $resultado = mysql_query($sql1, $conexion);
       //Insercción de controlador
       $sql2 = "INSERT INTO controlador(cantidad_c, controlador, ejes, s_d, observacion_c) VALUES('$cantidad_c', '$controlador', '$ejes', '$sd','$observacion_c')";
       $resultado = mysql_query($sql2, $conexion);
       //Insercción de sensor de altura 
       $sql3 = "INSERT INTO sensor(cantidad_a, sensor, modelo_a, observacion_a) VALUES('$cantidad_a', '$sensor', '$modelo_a', '$observacion_a')";
       $resultado = mysql_query($sql3, $conexion);
       $sql4 = "INSERT INTO guia(posicion, guia, balero, c, cremallera, piñon, c1) VALUES('$posicion', '$guia', '$balero', '$c', '$cremallera', '$piñon', '$c1')";
       $resultado = mysql_query($sql4, $conexion);
        if($resultado == 1)
            header("Location: index_ficha.php");
        exit;
    }
    
?>