<?php
//MODULO DE CONEXION ORIENTADA A OBJETOS
class Conection {
	public function conectar(){
		$CONECTAR="host='127.0.0.1' dbname='consultorio' user='canaima' password='canaima'";
		$CONEXION=pg_connect($CONECTAR);

		if ($CONEXION==NULL) {
		    print("<center>La conexion es nula </center><br/>");
		}

		elseif (!$CONEXION) {
		    print("<center>Error en la conexion </center><br/>");
		}

		return $CONEXION;
	}

}

?>

