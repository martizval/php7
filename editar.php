<?php
include 'config/conexion.php';
error_reporting(0);
session_start();
$bus = $_POST['txtbus'];
$buscar = $_POST['btnfiltrar'];
$seleccionar = $_POST['btnseleccionar'];


if (isset($seleccionar)) {
    $sql = "SELECT * FROM usuarios WHERE id=$_SESSION[id]";
    $ejecutar = $conexion->query($sql);
    $rows = $ejecutar->fetch_row();
}
?>
<!DOCTYPE html>
<html>

    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" 
              rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  
              media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Editar y Buscar</title>
    </head>

    <body>
        <form method="post" action="editar.php">
            <div class="row">
                <h2>Administrar Usuarios</h2>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="number" name="txtid" class="validate" value="<?php echo $rows[0]; ?>">
                        <label>Id</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="txtnom" class="validate" value="<?php echo $rows[1]; ?>">
                        <label>Nombres</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="txtape" class="validate" value="<?php echo $rows[2]; ?>">
                        <label>Apellidos</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="email" name="txtmail" class="validate" value="<?php echo $rows[3]; ?>">
                        <label>Correo</label>
                    </div>
                </div>


                <div class="input-field col s6">
                   <?php
                    if ($rows > 0 ) {
                        echo "<button type='submit' name='btneditar' class='waves-effect waves-light btn purple'>
                        Editar
                    </button> ";
                    } else {
                    /*echo "<button type='submit' name ='btnguardar' class='waves-effect waves-light btn'>
                        Guardar
                    </button> ";    */
                    }
                    ?>
                     
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row">
                    <h2>Consultar Usuarios</h2>
                    <div class="input-field col s6">
                        <input type="number" name="txtbus" class="validate">
                        <label>Identificación</label>
                    </div>
                    <div class="input-field col s6">
                        <button type="submit" name="btnfiltrar" 
                                class="waves-effect waves-light btn blue">
                            Buscar
                        </button>  
                    </div>
                </div>
            </div>

            <?php
            
            if (isset($buscar)) {
                echo "<table class ='responsive-table'>"
                . "<tr>"
                . "<th>ID</th>"
                . "<th>NOMBRES</th>"
                . "<th>APELLIDOS</th>"
                . "<th>EMAIL</th>"
                . "<th>SELECCIONAR</th>"
                . "</tr>";
                $sql = "SELECT * FROM usuarios WHERE id=$bus";
                $ejecutar = $conexion->query($sql);
                while ($filas = $ejecutar->fetch_row()) {
                    echo "<tr>"
                    . "<td>$filas[0]</td>"
                    . "<td>$filas[1]</td>"
                    . "<td>$filas[2]</td>"
                    . "<td>$filas[3]</td>"
                    . "<td><button type='submit' name='btnseleccionar'  class='waves-effect "
                    . "waves-light btn green'>"
                    . "<i class='material-icons'>edit</i>"
                    . "</td>"
                    . "</tr>";
                    
                    $_SESSION['id']=$filas[0];
                }
                echo "</table>";
            }
            ?>
        </form>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
<?php
$editar=$_POST['btneditar'];
$id=$_POST['txtid'];
$nom=$_POST['txtnom'];
$ape=$_POST['txtape'];
$email=$_POST['txtmail'];

if (isset($editar)) {
    $sql="UPDATE usuarios SET id=$id, nombres='$nom',apellidos='$ape',correo='$email' WHERE id=$_SESSION[id]"; 
    
    if ($ejecutar=$conexion->query($sql)) {
        echo "<script>"
        . "M.toast({html: 'Actualizado Correctamente', classes: 'rounded green',inDuration:3000});"
                . "</script>";
    } else {
        echo "<script>"
        . "M.toast({html: 'Error de Actualizado ', classes: 'rounded red',inDuration:3000});"
                . "</script>";
    }
}


