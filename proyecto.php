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
		$sql = "INSERT INTO proyecto(no_serie, marca, modelo) VALUES('$no_serie', '$marca', '$modelo')";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_proyecto.php");
		else 
			echo '<script language="javascript">
        alert("Intentalo de nuevo, número de serie ya existe.")
        window.location.href="index_proyecto.php";
          </script>';
		exit;
	}
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_edicion
	if(isset($_POST['guardar_edicion'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$sql = "UPDATE proyecto SET no_serie ='$no_serie', marca = '$marca', modelo = '$modelo' WHERE id = $proyecto_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_proyecto.php");
		exit;
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
	if(isset($_GET['editar_proyecto_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "SELECT * FROM proyecto WHERE id = $editar_proyecto_id";
		$resultado = mysql_query($sql, $conexion);
		$proyecto = mysql_fetch_assoc($resultado);
		include('editar_proyecto.php');
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre eliminar_marca_id
	if(isset($_GET['eliminar_proyecto_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "DELETE FROM proyecto WHERE id = $eliminar_proyecto_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_proyecto.php");
		else
			echo "ERROR";
		exit;
	}

	function pr($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}