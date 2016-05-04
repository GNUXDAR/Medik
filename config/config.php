<?php

	ini_set("default_charset", "utf-8");
	ini_set('display_errors', 'on');
	error_reporting(E_ALL ^ E_NOTICE);

	include_once('../control/conexion.php');
	$sql="SELECT * FROM  config_cita ";
    $conectando = new Conection();
    $query = pg_query($conectando->conectar(), $sql) or die('ERROR AL BUSCAR DATOS: ' . pg_last_error());
    $config = pg_fetch_array($query);

    define('numeroCitas', $config['numero_cita'] );
    define('precioCita', $config['precio_cita'] );
	