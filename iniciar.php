<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="css/estilos.css"/>
    </head>

    <body>
        <section class="contenido">
            <h5> INICIAR SESION</h5>
            <div class="row">
                <form class="col s12" method="post" action="iniciar.php">
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">person_outline</i>
                        <input name="txtuser" type="text" class="validate">
                        <label>Usuario</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">vpn_key</i>
                        <input type="password" name="txtpass" class="validate">
                        <label >Contraseña</label>
                    </div>
                    <div class="input-field col s6">
                        <button type="submit" name="btninicio" class="waves-effect waves-light btn">INGRESAR</button>
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
session_start();
$user=$_POST['txtuser'];
$pass=$_POST['txtpass'];
$iniciar=$_POST['btninicio'];

if (isset($iniciar)) {
    $sql="SELECT user,pass FROM admin WHERE user='$user' and pass='$pass'";
    $ejecutar=$conexion->query($sql);
    $fila=$ejecutar->fetch_row();
    if(empty($user)|| empty($pass)){
        echo "<script>"
        . "M.toast({html: 'Ingrese los campos', classes: 'rounded red',inDuration:3000});"
                . "</script>";
    } else {
        if ($fila[0]== $user and $fila[1]== $pass) {
            $_SESSION['user']=$user;
        header('location:administrar.php' );
    } else {
        echo "<script>"
        . "M.toast({html: 'Usuario o Contraseña Incorrecta', classes: 'rounded red',inDuration:3000});"
                . "</script>";
    }
    }
    
}