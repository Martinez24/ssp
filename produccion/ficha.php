<?php
    /**
     * Archivo para el control acciones en el módulo de Ventas
     * acciones como guardar y eliminar
    **/
    // Llamamos al archivo al cúal vamos a utilizar para ver tareas.
    //require 'sqlGestion.php';
    // Definimos la zona horaria
    date_default_timezone_set('America/Mexico_City');
    // Iniciamos las sesiones de php
    session_start();
    
    // Definimos los datos del servidor y base de datos para establecer conexión con MySQL
    $host = 'localhost';
    $user = 'root';
    $password = '123';
    $bd = 'ssp';
    // Ejecutamos conexión con MySQL
    $conexion = @mysql_connect($host, $user, $password);
    // Comprueba la existencia de una peticion post que corresponda al nombre guardar_nuevo
    @mysql_select_db($bd, $conexion);
    //Consulta para colocar los acentos requeridos en los registros 
    mysql_query("SET NAMES 'utf8'");
    // Se comprueba la existencia de la petición post que corresponde al nombre agrega_proyecto
    if($_POST['agrega_proyecto']){
        extract($_POST);
        $sql = "SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
		 				c.No_Cliente,c.nombre as nombre, c.domicilio as domicilio, c.rfc as rfc, c.id_municipio as municipio, c.correo as correo, c.telefono as tel, c.c_p as cp, c.nu_cliente as no_cliente, c.id_estado as estado, 
		 					v.id_vendedor, v.nombre as vendedor, 
		 						pr.id, pr.modelo as modelo
                                 from proforma p inner join cliente c on c.No_Cliente = p.id_cliente inner join vendedor v on v.id_vendedor = p.id_vendedor 
		 							inner join proyecto pr on pr.id = p.id_proyecto 
										WHERE id_proforma = $proforma_id";
        $resultado = mysql_query($sql, $conexion);
        $proyecto = mysql_fetch_assoc($resultado);
        $tarea['proyecto'] = $proyecto;
        $_SESSION['tarea'] = $tarea;
        header("Location: index_gestion.php");
    }

    /*
    // Se comprueba la existencia de la petición post que corresponde al nombre agrega_tarea
   if($_POST['agrega_tarea']){
        // Extraemos el contenido de la variable $_POST en variables independientes
        extract($_POST);
        $gestion['id_departamento'] = $departamento_id;
        $gestion['id_personal'] = $personal_id;
        $gestion['id_proyecto'] = $proyecto_id;
        $gestion['fecha_inicio'] = $fecha_inicio;
        $gestion['fecha_entrega'] = $fecha_entrega;
        $gestion['observacion'] = $observacion;
        $gestion['reporte'] = $reporte;
        $tarea['gestiones'][] = $gestion;
        $_SESSION['tarea']= $tarea; 
        header("Location: index_gestion.php");

    }
    // Se comprueba la existencia de la petición get que corresponde al nombre eliminar_tarea para quitar alguna tarea de la gestión
   if(isset($_GET['eliminar_tarea'])){
        //Rescatamos el indice 
        $index_tarea = $_GET['eliminar_tarea'];
        //Eliminamos la tarea del arreglo de productos
        $gestion = $tarea['gestiones'][$index_tarea];
        unset($tarea['gestiones'][$index_tarea]);
        $_SESSION['tarea']= $tarea;
        header("Location: index_gestion.php");
    }
    // Se comprueba la existencia de la petición get que corresponde al nombre cancelar_venta
    if(isset($_GET['cancelar_tarea'])){
          $_SESSION['tarea'] = array('proyecto' => NULL, 'gestiones' => array());
        header("Location: index_gestion.php");
    }
   //la petición get que corresponde al nombre guardar_venta
   if(isset($_GET['guardar_tarea'])){
        extract($gestion=$tarea['gestiones']);  
         // Por cada tarea guardaremos un registro relacionado ala getion     
         foreach ($tarea['gestiones'] as $index => $gestion) {
            print_r($tarea['gestiones']);
         // Por cada departamento guardaremos un registro relacionado al proyecto
            $sql = "INSERT INTO tarea(estatus, id_departamento, id_personal, id_proyecto, fecha_inicio, fecha_entrega, observacion, reporte, usuario)
            VALUES(1,".$gestion['id_departamento'].", '".$gestion['id_personal']."', ".$gestion['id_proyecto'].", '".$gestion['fecha_inicio']."', '".$gestion['fecha_entrega']."', '".$gestion['observacion']."', '".$gestion['reporte']."', '".$_SESSION['usuario']['nombre']."')";
            $resultado = mysql_query($sql, $conexion); 
            $proyecto_id = $gestion['id_proyecto'];   
            if($resultado != 1){
                echo "ERROR AL GUARDAR LA TAREA";
                exit;
            }
        }
            // Limpiamos sesión de la tarea
        $_SESSION['tarea'] = array('proyecto' => NULL, 'gestiones' => array());
        // Redireccionamos a la vista de la tarea generada
        header("Location:sqlGestion.php?ver_gestion=$proyecto_id");   
    }*/
?>



<?php
	/**
	*Controlador del modulo de ficha tecnica.
	*Agrega proyecto a la ficha por medio de la factura.
	**/
	//Conexión a la base datos.
	date_default_timezone_set('America/Mexico_City');
		$host = 'localhost';
		$user = 'root';
		$password = '123';
		$bd = 'ssp';
	$conexion = @mysql_connect($host, $user, $password);
	@mysql_select_db($bd, $conexion);
	mysql_query("SET NAMES 'utf8'");
	if($_POST['agrega_proyecto']){
		extract($_POST);
		$sql ="SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
		 				c.No_Cliente,c.nombre as nombre, 
		 					v.id_vendedor, v.nombre as vendedor, 
		 						pr.id, pr.modelo as modelo from proforma p inner join cliente c on c.No_Cliente = p.id_cliente inner join vendedor v on v.id_vendedor = p.id_vendedor 
		 							inner join proyecto pr on pr.id = p.id_proyecto 
										WHERE id_proforma = $proforma_id ";
         $resultado = mysql_query($sql, $conexion);         
         $proyecto = mysql_fetch_assoc($resultado);
         $ficha['proyecto'] = $proyecto;
         $_SESSION['ficha'] = $ficha;
         header('Location: index_ficha.php');
	}

    

?>
