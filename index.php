<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <section class="contenido">
            <h2>Crear Usuarios</h2>

            <div class="row">
                <form class="col s12" method="post" action="index.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">#</i>
                            <input type="number" class="validate" name="txtid">
                            <label>Identificacion</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" class="validate" name="txtnom">
                            <label>Nombres</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="icon_prefix" type="text" class="validate" name="txtape">
                            <label>Apellidos</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">email</i>
                            <input type="email" class="validate" name="txtmail">
                            <label>Correo</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <button type="submit" class="btn waves-effect waves-light" name="btnguardar">
                            Guardar
                             <i class="material-icons right">send</i>
                        </button>
                    </div>
                    </div>
                </form>
            </div>
        </section>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
<?php
include 'config/conexion.php';
error_reporting(0);
$id=$_POST['txtid'];
$nom=$_POST['txtnom'];
$ape=$_POST['txtape'];
$mail=$_POST['txtmail'];
$guardar=$_POST['btnguardar'];

if (isset($guardar)) {
    $sql="INSERT INTO usuarios VALUES('$id','$nom','$ape','$mail')";
    if ($ejecutar=$conexion->query($sql)){
        echo "<script>"
        . "M.toast({html: 'Guardado Correctamente', classes: 'rounded green',inDuration:3000});"
                . "</script>";
    } else {
        echo "<script>"
        . "M.toast({html: 'Error', classes: 'rounded red',inDuration:3000});"
                . "</script>";
    }
}