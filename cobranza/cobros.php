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
		if($porcentaje >= 101){
			echo '<script language="javascript">
      			alert("Error! El pago excedio el 100%")
        		window.location.href="index_cobro.php";
         		 </script>';         		
  		}else{
		$sql = "INSERT INTO cobro (porcentaje, id_proforma) VALUES ($porcentaje, $proforma_id)";
		$resultado = mysql_query($sql, $conexion);	
			if($porcentaje == 100)
			{
				$sql = "UPDATE proforma SET estatus = 0 WHERE id_proforma = $proforma_id ";
				$ide_pro = $proforma_id;
				$resultado = mysql_query($sql, $conexion);
				echo '<script languaje="javascript">
						alert("Se actualizado el estado del proyecto a vendido")
						window.location.href="index_cobro.php";
						</script>';
			}
		}
		if($resultado == 1)
			header("Location: index_cobro.php");	
		else 
			echo '<script language="javascript">
      alert("Error! Ya exsite un cobro con este número de factura")
        window.location.href="index_cobro.php";
          </script>';
		exit;
	}
	// Comprueba la existencia de una peticion post que corresponda al nombre guardar_edicion
	if(isset($_POST['guardar_edicion'])){
		// Extraemos el contenido de la variable $_POST en variables independientes
		extract($_POST);
		$suma ="SELECT SUM(porcentaje) + SUM($porcentaje) as suma from cobro where id_cobro = $cobro_id";
		$resultado = mysql_query($suma, $conexion);
		$suma = mysql_fetch_assoc($resultado);
		$sumRes = $suma['suma'];
		if ($sumRes >= 101 ){
			echo '<script language="javascript">
      		alert("El pago excedio el 100%, intente de nuevo")
        	window.location.href="index_cobro.php";
          	</script>';
		}else{
		$sql = "UPDATE cobro SET porcentaje = $sumRes WHERE id_cobro = $cobro_id";
			$resultado = mysql_query($sql, $conexion);	
				if($sumRes == 100){
					$estatus = "UPDATE proforma SET estatus = 0 WHERE id_proforma = "'.$proyecto['id_proforma']."'";
						$res = mysql_query($estatus, $conexion);
						echo '<script languaje="javascript">
						alert("Se actualizado el estado del proyecto a vendido")
						window.location.href="index_cobro.php";
						</script>';
				}
		if($resultado == 1)
			header("Location: index_cobro.php");
		exit;
	}
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
	if(isset($_GET['pago_proyecto_id'])){
		// Extraemos el contenido de la variable $_GET en variables independientes
		extract($_GET);
		$sql = "SELECT p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.estatus as estatus, p.descripcion as descripcion,
		 				c.No_Cliente,c.nombre as nombre,
		 				 co.id_cobro, co.porcentaje as porcentaje, 
		 					v.id_vendedor, v.nombre as vendedor, 
		 						pr.id, pr.modelo as modelo from proforma p 
		 						inner join cliente c on c.No_Cliente = p.id_cliente 
		 						inner join vendedor v on v.id_vendedor = p.id_vendedor 
		 						inner join cobro co on p.id_proforma = co.id_proforma
		 							inner join proyecto pr on pr.id = p.id_proyecto WHERE id_cobro = $pago_proyecto_id";
		$resultado = mysql_query($sql, $conexion);
		$proyecto = mysql_fetch_assoc($resultado);
		include('cambiar_pago.php');
		$prof = $proyecto['id_proforma'];
		echo $prof;
		exit();
	}
	// Se comprueba la existencia de la petición get que corresponde al nombre eliminar_marca_i
	function pr($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}