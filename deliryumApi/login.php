<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Content-Type: text/html; charset=utf-8");
$method = $_SERVER['REQUEST_METHOD'];
    
    include "conn.php";

    //sleep(1);	
	$JSONData = file_get_contents("php://input");
	$dataObject = json_decode($JSONData);    
    session_start();    
	    
  // $email = $dataObject -> txtemail
  // $contrasena = $dataObject -> txtpassword


	$usuario = $dataObject-> usuario;
	$pas =	$dataObject-> clave;
    
  if ($nueva_consulta = $mysqli->prepare("SELECT * FROM vusuario  WHERE email = ?")) {
        $nueva_consulta->bind_param('s', $usuario);
        $nueva_consulta->execute();
        $resultado = $nueva_consulta->get_result();
        if ($resultado->num_rows == 1) {
            $datos = $resultado->fetch_assoc();
             $encriptado_db = $datos['contrasena'];
            if (password_verify($txtpassword, $encriptado_db) and  'estado'== 'Activo')
            {
                $_SESSION['txtemail'] = $datos['email'];
                echo json_encode(array('conectado'=>true,'id'=>$datos['id'],'txtemail'=>$datos['email'], 'nombre'=>$datos['pri_nombre'],  'apellidoPaterno'=>$datos['apellido_paterno'], 'apellidoMaterno'=>$datos['apellido_mateno'], 'rol'=>$datos['rol'], 'cliente'=>$datos['cliente'] , 'estado'=>$datos['estado']  ) );

              }else {
                 echo json_encode(array('conectado'=>false, 'error' => 'La clave es incorrecta, vuelva a intentarlo.'));
                    }
        }
        else {
              echo json_encode(array('conectado'=>false , 'error' => 'El usuario no existe.'));
        }
        $nueva_consulta->close();
      }
      else{
        echo json_encode(array('conectado'=>false, 'error' => 'No se pudo conectar a BD'));
      }
 // }
$mysqli->close();
?>