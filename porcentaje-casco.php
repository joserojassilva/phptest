<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8 *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With,Accept,Access-Control-Request-Method");


include('conn.php');


// SELECT
$query = "SELECT * FROM vpje_casco;";
$resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('Error en consulta'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        if($row['casco'] == 0 || $row['persona'] == 0){
            $res = 0;
        }else{
            $res = number_format($row['casco'] / $row['persona'] * 100,1);
        }
        $json[] = array(
            'porcentajeCasco' => $res,
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    exit;

    ?>