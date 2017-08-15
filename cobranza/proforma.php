<?php
	/**
	 * Archivo para el control acciones en el módulo de personal
	 * acciones como guardar, eliminar y editar
	**/
	// Definimos los datos del servidor y base de datos para establecer conexión con MySQL
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$bd = 'ssp';
	// Ejecutamos conexión con MySQL
	$conexion = @mysql_connect($host, $user, $password);
	// Seleccionamos la base de datos que utilizaremos
	@mysql_select_db($bd, $conexion);
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_nuevo
	if(isset($_POST['guardar_nuevo'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$sql = "INSERT INTO proforma(no_factura, fecha_inicio, id_cliente, id_vendedor, fecha_entrega, id_proyecto, descripcion, estatus) VALUES('$no_factura', '$fecha_inicio', '$id_cliente', '$id_vendedor', '$fecha_entrega', '$id_proyecto', '$descripcion', 1)";
		$resultado = mysql_query($sql, $conexion);
		//Guardamos el ultimo id insertado en proforma_id.
		$proforma_id = mysql_insert_id();
		//Insertamos registro dentro de la tabla notificaciones.
		$sql1 = "INSERT INTO notificaciones (id_proforma, estatus, contador) VALUES('$proforma_id', 1, 1)";
		$notificacion = mysql_query($sql1, $conexion);
		if($resultado == 1)
			header("Location: index_proforma.php");
		else 
			echo '<script language="javascript">
        alert("Intentalo de nuevo, número de factura ya existe.")
        window.location.href="index_proforma.php";
          </script>';
		exit;
	}
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_edicion
	if(isset($_POST['guardar_edicion'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$sql = "UPDATE proforma SET descripcion = '$descripcion' WHERE id_proforma = $proforma_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_proforma.php");
		exit;
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
	if(isset($_GET['editar_proforma_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
		 				c.No_Cliente,c.nombre as nombre, 
		 					v.id_vendedor, v.nombre as vendedor, 
		 						pr.id, pr.modelo as modelo from proforma p inner join cliente c on c.No_Cliente = p.id_cliente inner join vendedor v on v.id_vendedor = p.id_vendedor 
		 							inner join proyecto pr on pr.id = p.id_proyecto 
										WHERE id_proforma = $editar_proforma_id";
		$resultado = mysql_query($sql, $conexion);
		$proforma = mysql_fetch_assoc($resultado);
		include('editar_proforma.php');
		
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre eliminar_marca_id
	if(isset($_GET['eliminar_proforma_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "UPDATE proforma SET estatus = '0' WHERE id_proforma = $eliminar_proforma_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_proforma.php");
		else 
			echo "ERROR";
		exit;
	}

	function pr($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
	