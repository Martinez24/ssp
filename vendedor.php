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
		$sql = "INSERT INTO vendedor(nombre, id_sucursal, correo, telefono) VALUES('$nombre', '$sucursal_id', '$email', '$telefono')";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_vendedor.php");
		else 
			echo '<script language="javascript">
        alert("Intentalo de nuevo, correo o nombre del vendedor ya existen.")
        window.location.href="index_vendedor.php";
          </script>';
		exit;
	}
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_edicion
	if(isset($_POST['guardar_edicion'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$sql = "UPDATE vendedor SET nombre ='$nombre', id_sucursal = '$sucursal_id', correo = '$correo', telefono = '$telefono' WHERE id_vendedor = $vendedor_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_vendedor.php");
		exit;
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
	if(isset($_GET['editar_vendedor_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "SELECT * FROM vendedor WHERE id_vendedor = $editar_vendedor_id";
		$resultado = mysql_query($sql, $conexion);
		$vendedor = mysql_fetch_assoc($resultado);
		include('editar_vendedor.php');
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre eliminar_marca_id
	if(isset($_GET['eliminar_vendedor_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "DELETE FROM vendedor WHERE id_vendedor = $eliminar_vendedor_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_vendedor.php");
		else
			echo "ERROR";
		exit;
	}

	function pr($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}