<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8 *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With,Accept,Access-Control-Request-Method");


include('conn.php');


// SELECT
$query = "SELECT * FROM porc_graficos"; //SELECT * FROM `grupo` WHERE estado=1; consulta solo por los grupos activos
$resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('Error en consulta'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'totalPersona' => $row['total_persona'],
            'totalSitrans' => $row['total_sitrans'],
            'totalCasco' => $row['total_casco'],
            'totalChaleco' => $row['total_chaleco'],
            'pctjeSitrans' => $row['porc_sitrans'],
            'pctjeCasco' => $row['porc_casco'],
            'pctjeChaleco' => $row['porc_chaleco'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    exit;

    ?>