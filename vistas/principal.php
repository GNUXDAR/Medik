<?php  

    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
    }
?>
<?php 
        include_once('../control/conexion.php');
        include_once('sidebar.php');
        include_once('script.php');

?>  
    <div class="content">
        <div id="pad-wrapper" class="form-page">
            <div class="row header">
                <h3>MEDIk</h3></br>
                <h4>- Sistema de citas Medicas -</h4></br>
                
            </div>

            <div>
<?php 
        include_once('../control/conexion.php');

        // $ci = $_POST['ci'];

        $buscar="SELECT * FROM equipos ";
        $conectando = new Conection();

        // $verifica = pg_query($conectando->conectar(), $buscar) or die('ERROR AL INSERTAR DATOS: ' . pg_last_error());
        $localizar=pg_num_rows($verifica);


        if ($localizar > 0){ 

         
        echo '
        <h1 align="center">Equipos</h1>

        <br/>

        <form method="post" action="../vistas/cliente_mostrar.php" style="float: right; margin: 0 1.5% 5px 0;">
        <label>Buscar <input type="text" name="ci" /></label>
        <input type="submit" value="Buscar" />
        </form>

        <center>

        <table id="tabla_muetral" border="0" cellpadding="4">

        <tr id="esquema_tabla">

            <th><h4>Equipo</h4></th>
            <th><h4>Status</h4></th>
            <th><h4>Tiempo</h4></th>
           <!-- <th>CARRERA</th>-->
            <!--<th>ESTADO</th>-->
            
        </tr>

        <tbody>';

         while($ATRIBUTO=pg_fetch_array($verifica)) {

            echo '<tr>
             
                <td><h5>'.$ATRIBUTO['codigo_equipos'].'</h5></td>
                <td>'.$ATRIBUTO['status_prestamo'].'</td>
                <td>'.$ATRIBUTO['apel_persona'].'</td>
                <td>'.$ATRIBUTO['edad_persona'].'</td>
                <td>'.$ATRIBUTO['sexo_persona'].'</td>
                

                </tr>';

         }

        echo '   
        </tbody>

        </table>

        </center>';
        }

        elseif ($localizar==0) {
            // print ("<script>alert('No se localizo ningun equipo');</script>");
            // print('<meta http-equiv="refresh" content="0; URL=../vistas/principal.php">');
        }

        else {
            print ("<script>alert('Ocurrio un error al intentar localizar al equipo');</script>");
            print('<meta http-equiv="refresh" content="0; URL=../vistas/principal.php">');
        }

?>
            </div>
        </div>
        
    </div>
