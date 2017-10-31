<?php 
$host = 'localhost';
$user = 'root';
$password = '123';
$bd = 'ssp';
$conexion = @mysql_connect($host, $user, $password);
@mysql_select_db($bd, $conexion);

 if($_POST['agrega_ficha']){
        extract($_POST);
        $sql = "INSERT INTO servicio(cantidad, servicio, modelo, descripcion) VALUES('$cantidad', '$servicio', '$modelo', '$descripcion')";
        $resultado = mysql_query($sql, $conexion);
        
        if($resultado == 1)
            header("Location: index_ficha.php");
        exit;
    }
?>