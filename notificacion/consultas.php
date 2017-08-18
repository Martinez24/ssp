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
        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
         c.No_Cliente,c.nombre as nombre_cliente, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio as municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, c.c_p as cp,
         e.id_estado, e.estado as estado, 
         co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
         v.id_vendedor, v.nombre as vendedor, 
         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
         from proforma p 
         inner join cliente c on c.No_Cliente = p.id_cliente 
         inner join vendedor v on v.id_vendedor = p.id_vendedor 
         inner join proyecto pr on pr.id = p.id_proyecto 
         inner join estado e on c.id_estado = e.id_estado 
         inner join cobro co on p.id_proforma = co.id_proforma
         where p.id_proforma = $ver_proforma_id";

        $resultado = mysql_query($sql, $conexion);
        //Consulta para colocar los acentos requeridos en los registros 
         mysql_query("SET NAMES 'utf8'");
        $proforma1 = mysql_fetch_assoc($resultado);
        $proyectos = array();
        $sql = "SELECT 
        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
         c.No_Cliente,c.nombre as nombre, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, 
         e.id_estado, e.estado as estado, 
         co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
         v.id_vendedor, v.nombre as vendedor, 
         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
         from proforma p 
         inner join cliente c on c.No_Cliente = p.id_cliente 
         inner join vendedor v on v.id_vendedor = p.id_vendedor 
         inner join proyecto pr on pr.id = p.id_proyecto 
         inner join estado e on c.id_estado = e.id_estado 
         inner join cobro co on p.id_proforma = co.id_proforma 
         where p.id_proforma = $ver_proforma_id";
        $resultado = mysql_query($sql, $conexion);
        //Mientras 
        while ($proforma = mysql_fetch_assoc($resultado)) {
            $proforma[]=$proforma;
        }
        include('ver_consultaProforma.php');
        exit;
    }
    if(isset($_GET['reporte_vendidos']))
    {
        header("Content-Type_ application/vnd.ms-excel");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=reporte_vendidos_".date('Y-m-d').".xls");
        $sql = "SELECT 
                        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
                         c.No_Cliente,c.nombre as nombre_cliente, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio as municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, c.c_p as cp,
                         e.id_estado, e.estado as estado, 
                         co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
                         v.id_vendedor, v.nombre as vendedor, 
                         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
                         from proforma p 
                         inner join cliente c on c.No_Cliente = p.id_cliente 
                         inner join vendedor v on v.id_vendedor = p.id_vendedor  
                         inner join proyecto pr on pr.id = p.id_proyecto 
                         inner join estado e on c.id_estado = e.id_estado 
                         inner join cobro co on p.id_proforma = co.id_proforma where co.estatus = 0";
        $resultado = mysql_query($sql, $conexion);
        $render = '<head>
                    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
                    </head>
                <table border="2">
                    <thead>
                    <tr>
                        <th>No. Factura</th>
                        <th>Cliente</th>
                        <th>Fecha inicio</th>
                        <th>Fecha Entrega</th>
                        <th>No. Serie</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Vendedor</th>
                        <th>Estatus</th>  
                    </tr>
                    </thead>
                <tbody>';
        while($vendido = mysql_fetch_assoc($resultado)){
            $render.="<tr>";
            $render.="<td>".$vendido['no_factura']."</td>";
            $render.="<td>".$vendido['nombre_cliente']."</td>";
            $render.="<td>".$vendido['fecha_inicio']."</td>";
            $render.="<td>".$vendido['fecha_entrega']."</td>";
            $render.="<td>".$vendido['numero_serie']."</td>";
            $render.="<td>".$vendido['modelo']."</td>";
            $render.="<td>".$vendido['marca']."</td>";
            $render.="<td>".$vendido['vendedor']."</td>";
            $render.="<td>".($vendido['estatus']==0?'Vendido':'Proceso')."</td>";
            $render.="</tr>";
        }
        $render.= "</tbody></table>";
        print($render);
    }
     if(isset($_GET['reporte_proceso']))
    {
        header("Content-Type_ application/vnd.ms-excel");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("content-disposition: attachment;filename=reporte_proceso_".date('Y-m-d').".xls");
        $sql = "SELECT 
                        p.id_proforma, p.no_factura as no_factura, p.fecha_inicio as fecha_inicio, p.fecha_entrega as fecha_entrega, p.descripcion as descripcion,
                         c.No_Cliente,c.nombre as nombre_cliente, c.nu_cliente as numero, c.id_estado as estado, c.id_municipio as municipio, c.domicilio as domicilio, c.rfc as rfc, c.correo as correo, c.telefono as telefono, c.c_p as cp,
                         e.id_estado, e.estado as estado, 
                         co.id_cobro, co.estatus as estatus, co.porcentaje as porcentaje,
                         v.id_vendedor, v.nombre as vendedor, 
                         pr.id, pr.modelo as modelo, pr.no_serie as numero_serie, pr.marca as marca 
                         from proforma p 
                         inner join cliente c on c.No_Cliente = p.id_cliente 
                         inner join vendedor v on v.id_vendedor = p.id_vendedor  
                         inner join proyecto pr on pr.id = p.id_proyecto 
                         inner join estado e on c.id_estado = e.id_estado 
                         inner join cobro co on p.id_proforma = co.id_proforma where co.estatus = 1";
        $resultado = mysql_query($sql, $conexion);
        $render = '<head>
                    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
                    </head>
                <table border="2">
                    <thead>
                    <tr>
                        <th>No. Factura</th>
                        <th>Cliente</th>
                        <th>Fecha inicio</th>
                        <th>Fecha Entrega</th>
                        <th>No. Serie</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Vendedor</th>
                        <th>Estatus</th>  
                    </tr>
                    </thead>
                <tbody>';
        while($vendido = mysql_fetch_assoc($resultado)){
            $render.="<tr>";
            $render.="<td>".$vendido['no_factura']."</td>";
            $render.="<td>".$vendido['nombre_cliente']."</td>";
            $render.="<td>".$vendido['fecha_inicio']."</td>";
            $render.="<td>".$vendido['fecha_entrega']."</td>";
            $render.="<td>".$vendido['numero_serie']."</td>";
            $render.="<td>".$vendido['modelo']."</td>";
            $render.="<td>".$vendido['marca']."</td>";
            $render.="<td>".$vendido['vendedor']."</td>";
            $render.="<td>".($vendido['estatus']==0?'Vendido':'Proceso')."</td>";
            $render.="</tr>";
        }
        $render.= "</tbody></table>";
        print($render);
    }
    function pr($var){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }