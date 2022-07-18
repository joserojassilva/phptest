<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8 *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With,Accept,Access-Control-Request-Method");


include('conn.php');


// SELECT
$query = "SELECT * FROM ind_anden"; //SELECT * FROM `grupo` WHERE estado=1; consulta solo por los grupos activos
$resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('Error en consulta'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'totalAlerta' => $row['total_alerta'],
            'personaAnden' => $row['persona_anden'],
            'totalColab' => $row['total_colab'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    exit;

    ?>