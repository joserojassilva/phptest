<?php
	// Conexion Local
	// $host = 'localhost';
	// $user = 'root';
	// $password = '';
	// $db = 'mydb'; //nombre de base de datos

	// Conectar Azure Cuenta jl.rojas@bluelatam
	// $host = 'iadeliryum.mysql.database.azure.com';
	// $user = 'mysqladmin';
	// $password = 'Adm1n1str4d0r89';
	// $db = 'deliryumia_azure';

	// Conectar Azure Bluelatam Oficial
	$host = 'mysql-bkn.mysql.database.azure.com';
	$user = 'ad1nmysqldel';
	$password = 'Del.20xx*';
	$db = 'deliryum_ia';

	$conexion = @mysqli_connect($host,$user,$password,$db); //variable que almacena los campos de conexion
	if(!$conexion){
		echo "Error en la conexión";
	}else{
		
	}

?>