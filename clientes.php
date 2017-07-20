<?php
	/**
	 * Archivo para el control acciones 
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
		$sql = "INSERT INTO cliente(nombre, domicilio, id_estado, id_municipio, rfc, correo, telefono, c_p) VALUES( '$nombre', '$domicilio', '$estado', '$municipio', '$rfc', '$correo', '$telefono', '$c_p')";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
				header("Location: index_cliente.php");
		else 
			echo '<script language="javascript">
        alert("Intentalo de nuevo, Nombre, RFC o correo ya existentes.")
        window.location.href="index_cliente.php";
          </script>';
		exit;
	}
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_edicion
	if(isset($_POST['guardar_edicion'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$sql = "UPDATE cliente SET nombre = '$nombre', domicilio = '$domicilio', rfc = '$rfc', correo = '$correo', telefono = '$telefono', c_p = '$c_p'  WHERE No_Cliente = ".$cliente['No_Cliente']."";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_cliente.php");	
		exit;
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
	if(isset($_GET['editar_cliente_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "SELECT * FROM cliente WHERE No_Cliente = $editar_cliente_id";
		$resultado = mysql_query($sql, $conexion);
		$cliente = mysql_fetch_assoc($resultado);
		include('editar_cliente.php');
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre eliminar_marca_id
	if(isset($_GET['eliminar_cliente_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "DELETE FROM cliente WHERE No_cliente = $eliminar_cliente_id";
		$resultado = mysql_query($sql, $conexion);
		if($resultado == 1)
			header("Location: index_cliente.php");
		else
			echo "ERROR";
		exit;
	}

	function pr($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}