<?php include 'CheckSesion.php'?>
<?php
    if($_SESSION['tipo']=="usuario"){
        header('location:Layout.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/HandleUsersAjax.js"></script>
</head>
<style>
    #users {
         overflow: scroll;
         height: 100%;
         width: 100%;
        }
</style>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id='users'>
        <?php
            include 'DbConfig.php';
            $link = mysqli_connect($server,$user,$pass,$basededatos);
    
            if(!$link){
                die("Fallo al conectar con la base de datos: " .mysqli_connect_error());
            }
    
            $sql = "SELECT * FROM usuarios;";
            $resul = mysqli_query($link,$sql,MYSQLI_USE_RESULT);
            if(!$resul){
                die("Error: ".mysqli_error($link));
            }

            echo "<table border = 2 id='usuarios'><tr><th>Email</th><th>Contraseña</th><th>Imagen</th><th>Estado</th><th>Cambiar Estado</th><th>Borrar Usuario</th></tr>";
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
    </div>
      
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>