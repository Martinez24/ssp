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
        header("Location: test.php");
    }


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
         header('Location: test.php');
	}

    

?>
