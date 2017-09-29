<?php
/** 
*Archivo de consultas para el modulo de gestiones
**/
date_default_timezone_set('America/Mexico_City');
session_start();
//Definimos los datos del servidor para conectarse a la base de da datos correspondiente
$host = 'localhost';
$user = 'root';
$password = '123';
$bd = 'ssp';
$conexion = @mysql_connect($host, $user, $password);
mysql_select_db($bd, $conexion);
mysql_query("SET NAMES 'utf8'");
if(isset($_GET['ver_proforma'])){
        $proforma_id = $_GET['ver_proforma'];
        verProforma($proforma_id);
    }
    if(isset($_GET['imprimir'])){
        $proforma_id = $_GET['imprimir'];
        $host = 'localhost';
        $user = 'root';
        $password = '123';
        $bd = 'ssp';
        $conexion = @mysql_connect($host, $user, $password);
        @mysql_select_db($bd, $conexion);
        //Esta consulta permite visualizar los datos de la proforma
        $sql ="SELECT 
        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
        c.No_Cliente,c.nombre as nombre_cliente, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio as municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, c.c_p as cp, 
        co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
        e.id_estado, e.estado as estado, 
        v.id_vendedor, v.nombre as vendedor, 
        pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
        from proforma p 
        inner join cliente c on c.No_Cliente = p.id_cliente 
        inner join vendedor v on v.id_vendedor = p.id_vendedor 
        inner join proyecto pr on pr.id = p.id_proyecto inner join estado e on c.id_estado = e.id_estado 
        inner join cobro co on p.id_proforma = co.id_proforma 
         where p.id_proforma = $proforma_id ";
        $resultado = mysql_query($sql, $conexion);
        $proforma = mysql_fetch_assoc($resultado);
        include('gestion_impresion.php');
        exit;
    }
    
    /**
     * Función para obtener la información pertienente a la venta y mmostrarla en vista
     * @param entero $compra_id ID de la compra
     * @return void
    **/
    
    /*function pr($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }*/

?>