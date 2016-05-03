<?php
//MODULO DE CONEXION ORIENTADA A OBJETOS
class Conection {
	public function conectar(){
<<<<<<< HEAD
		$CONECTAR="host='127.0.0.1' dbname='consulta' user='gnuxdar' password='123'";
=======
		$CONECTAR="host='127.0.0.1' dbname='consulta' user='grebo' password='123'";
>>>>>>> 89a451467197dfa12e14121dd5a1c77a31742e48
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

