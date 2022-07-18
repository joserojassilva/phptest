<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8 *");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization,X-Requested-With,Accept,Access-Control-Request-Method");


include('conn.php');


// SELECT
$query = "SELECT * FROM vusuario";
$resultado = mysqli_query($conexion, $query);
    if(!$resultado){
        die('Error en consulta'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'id' => $row['id'],
            'pNombre' => $row['pri_nombre'],
            'sNombre' => $row['seg_nombre'],
            'apPaterno' => $row['apellido_paterno'],
            'apMaterno' => $row['apellido_materno'],
            'email' => $row['email'],
            'nombreUsuario' => $row['nombre_usuario'],
            'contrasena' => $row['contrasena'],
            'rol' => $row['rol'],
            'cliente' => $row['cliente'],
            'estado' => $row['estado'],
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    exit;

    ?>