<?php
	/* Desarrollado por: @Arturognuxdar*/
	include_once('conexion.php');

	$usuario = $_POST['login_usr'];
	$contra = $_POST['pass_usr'];

	$sql="SELECT * FROM usr_system WHERE login_usr='$usuario' and pass_usr='$contra'";

    $conectando = new Conection();

    $resultado = pg_query($conectando->conectar(), $sql) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
    /*$resultado = pg_exec($sql);*/
	
	$cant = pg_num_rows($resultado);

	if($cant > 0){

        session_start();
        $_SESSION['usuario']=$usuario;
        //$_SESSION['tiempo']=time();  //control de tiempo de sesion (inacvtivo)
        
        
        //$slq2="SELECT privilegio as tipo, estado as estado FROM usuario WHERE login='$login' and clave='$clave'";
        $sql2="SELECT status_usr FROM usr_system WHERE login_usr='$usuario' and pass_usr='$contra' ";
        
        /* $resultado2=pg_exec($slq2);   */
        $resultado2 = pg_query($conectando->conectar(), $sql2) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $encontrad=pg_num_rows($resultado2);
        $resultusera=pg_fetch_array($resultado2);
        
        $estado_user=$resultusera['status_user'];
        
        $_SESSION['status_user']=$resultusera['status_user'];




        if ($estado_user==3) {
            session_destroy();
            echo "<script>alert('Usted se encuentra temporalmente inactivo')</script>";
            echo "<script>location.href = '../vistas/index.php';</script>";

        }
                
        else {
            if ($estado_user==2) {
                header("location:../vistas/principal.php");
            }
            else{
                header("location:../vistas/principal.php"); //principal2 con otro menu (admin)
            }
        }
        
        }
        
    else
    {
        echo "<script>alert('Los datos son incorrectos, intente nuevamente!')</script>";
        echo "<script>location.href = '../vistas/index.php';</script>";
    }
    
?>