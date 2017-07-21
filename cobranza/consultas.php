<?php
    /**
     * 
     * 
    **/
    // Definimos los datos del servidor y base de datos para establecer conexión con MySQL
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $bd = 'ssp';
    //Consulta para colocar los acentos requeridos en los registros 
    mysql_query("SET NAMES 'utf8'");
    // Ejecutamos conexión con MySQL
    $conexion = @mysql_connect($host, $user, $password);

    // Seleccionamos la base de datos que utilizaremos
    @mysql_select_db($bd, $conexion);
    // Se comprueba la existencia de la petición get que corresponde al nombre editar_marca_id
    //Consulta para colocar los acentos requeridos en los registros 
    mysql_query("SET NAMES 'utf8'");
    if(isset($_GET['ver_proforma_id'])){
        // Extraemos el contenido de la variable $_GET en variables independientes
        extract($_GET);
        $sql = "SELECT 
        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.estatus as estatus, p.descripcion as descripcion,
         c.No_Cliente,c.nombre as nombre, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, 
         e.id_estado, e.estado as estado, 
         v.id_vendedor, v.nombre as vendedor, 
         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
         from proforma p 
         inner join cliente c on c.No_Cliente = p.id_cliente 
         inner join vendedor v on v.id_vendedor = p.id_vendedor 
         inner join proyecto pr on pr.id = p.id_proyecto 
         inner join estado e on c.id_estado = e.id_estado 
         where id_proforma = $ver_proforma_id";

        $resultado = mysql_query($sql, $conexion);
        //Consulta para colocar los acentos requeridos en los registros 
         mysql_query("SET NAMES 'utf8'");
        $proforma1 = mysql_fetch_assoc($resultado);
        $proyectos = array();
        $sql = "SELECT 
        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.estatus as estatus, p.descripcion as descripcion,
         c.No_Cliente,c.nombre as nombre, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, 
         e.id_estado, e.estado as estado, 
         v.id_vendedor, v.nombre as vendedor, 
         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
         from proforma p 
         inner join cliente c on c.No_Cliente = p.id_cliente 
         inner join vendedor v on v.id_vendedor = p.id_vendedor 
         inner join proyecto pr on pr.id = p.id_proyecto 
         inner join estado e on c.id_estado = e.id_estado 
         where id_proforma = $ver_proforma_id";
        $resultado = mysql_query($sql, $conexion);
        //Mientras 
        while ($proforma = mysql_fetch_assoc($resultado)) {
            $proforma[]=$proforma;
        }
        include('ver_consultaProforma.php');
        exit;
    }
    function pr($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }