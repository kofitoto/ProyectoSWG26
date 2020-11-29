<?php
    include 'CheckSesion.php';
    include 'DbConfig.php';
    //Creamos la conexion con la BD.
    $link = mysqli_connect($server,$user,$pass,$basededatos);
    if(!$link){
        die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
    }
    $email = strip_tags($_GET['email']);

    $sql = "SELECT * FROM usuarios WHERE email='{$email}';";
    $resul = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($resul);
    $activo = $row['activado'];

    $estado='activado';
    if($activo=='activado'){
        $estado='Bloqueado';
    }

    $sql = "UPDATE usuarios SET activado ='{$estado}' WHERE email = '{$email}';";
    $resul = mysqli_query($link,$sql);
    if(!$resul){
        die("Error: ".mysqli_error($link));
    }

    
    $sql = "SELECT * FROM usuarios WHERE email='{$email}';";
    $resul = mysqli_query($link, $sql);
    if(!$resul){
        die("Error: ".mysqli_error($link));
    }

    $row = mysqli_fetch_array($resul);
    echo "<table border = 2 id='usuarios'>";
            $activo = $row['activado'];
                $email = $row['email'];
                $pass=$row['pass'];
                echo "<tr id=".$email.">
                <td>".$email."</td>
                <td>".$pass."</td>
                <td><img width='75' height='75' src='data:image/*;base64, ".$row['imagen']."' alt='Imagen'/></td>
                <td>".$activo."</td>";
                if($email != "admin@ehu.es"){
                    echo "<td><input type='button' onclick='CambiarEstado(this)' id='Estado_{$email}' value='Cambiar Estado'/></td>
                    <td><input type='button' onclick='EliminarUser(this)' id='Borrado_{$email}' value='Eliminar Usuario'/></td>";
                }
            echo "</tr>";
            while($row = mysqli_fetch_array($resul)){
                $activo = $row['activado'];
                $email = $row['email'];
                $pass=$row['pass'];
                echo "<tr id=".$email.">
                <td>".$email."</td>
                <td>".$pass."</td>
                <td><img width='75' height='75' src='data:image/*;base64, ".$row['imagen']."' alt='Imagen'/></td>
                <td>".$activo."</td>";
                if($email != "admin@ehu.es"){
                    echo "<td><input type='button' onclick='CambiarEstado(this)' id='Estado_{$email}' value='Cambiar Estado'/></td>
                    <td><input type='button' onclick='EliminarUser(this)' id='Borrado_{$email}' value='Eliminar Usuario'/></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
    mysqli_close($link);      
?>