<?php
    if($_REQUEST['pass']===$_REQUEST['pass2']){
    include 'DbConfig.php';
    $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
    if(!$mysqli){
        die("Fallo al conectar con Mysql: ".mysqli_connect_error());
    }
    $pass = crypt($_REQUEST['pass'],'./0-9A-Za-z');
    $sql = "UPDATE usuarios SET pass='".$pass."' WHERE email='".$_REQUEST['email']."';";
    $resul = mysqli_query($mysqli,$sql);
    if(!$resul){
        die("Error al intentar cambiar la contraseña.");
    }else{
        echo "<h4> CORRECTO! iniciar sesion : <a href=\"LogIn.php\">enlace.</a></h4>";
    }
    }else{
    echo "<h3>Las contraseñas no coinciden.</h3>";
    }
?>