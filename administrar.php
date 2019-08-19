<?php
session_start();
error_reporting(0);

if (empty($_SESSION['user'])) {
    
    header('location:iniciar.php');
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
         <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h2>Bienvenido $_SESSION[user]</h2>";
        ?>
        <form action="administrar.php" method="post">
             <button type="submit" name="btnsalir" class="waves-effect waves-light btn grey">SALIR</button>
        </form>
        
    </body>
</html>
<?php
$salir=$_POST['btnsalir'];
if (isset($salir)) {
    session_destroy();
    header('location:iniciar.php');
}