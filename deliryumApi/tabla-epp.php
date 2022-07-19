<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8 *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With,Accept,Access-Control-Request-Method");


include('conn.php');


// SELECT
$query = "SELECT * FROM vtabla_epp"; //SELECT * FROM `grupo` WHERE estado=1; consulta solo por los grupos activos
$resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('Error en consulta'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'id' => $row['id'],
            'fecha' => $row['fecha'],
            'hora' => $row['hora'],
            'anden' => $row['anden'],
            'sitrans' => $row['sitrans'],
            'noAutorizado' => $row['no_autorizado'],
            'totalPersona' => $row['total_persona'],
            'casco' => $row['casco'],
            'chaleco' => $row['chaleco'],
            'personaAnden' => $row['persona_en_anden'],
            'totalAlerta' => $row['total_alerta'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    exit;

    ?>