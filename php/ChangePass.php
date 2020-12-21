<?php session_start();?>
<html>
    <head><?php include '../html/Head.html';?></head>
    <body>
        <?php include 'Menus.php'?>
        <section class="main" id="s1">
            <form method="POST" action="ChangePass.php">
                <h4>Introduce tu direccion de correo electronico:*</h4>
                <label>Si es correcta se te enviará un email para restablecer la contraseña.</label><br>
                <input type="email" name="email" id="email" required/><br>
                <input type="submit" id="submit" value="Cambiar contraseña"/>
            </form>
            <?php
            if(isset($_REQUEST['email'])){
                include 'DbConfig.php';
                $mysqli = mysqli_connect($server,$user,$pass,$basededatos);
                if(!$mysqli){
                    die("Fallo al conectar con Mysql: ".mysqli_connect_error());
                }
                $email = $_REQUEST['email'];
                $sql = "SELECT * FROM usuarios WHERE email='$email';"; 
                $resultado = mysqli_query($mysqli,$sql);
                if(mysqli_num_rows($resultado)!=1){
                    die();
                }
                $cod = generateRandomString();
                $_SESSION['codigo'] = $cod;
                $_SESSION['email_rec'] = $_REQUEST['email'];

                $msg = "<html><head><title>Restablecimiento contraseña.</title></head><body><p>Haz click aqui para restablecer la contraseña 'https://sistemasweb321.000webhostapp.com/ProyectoSWG26/php/RestablecerContrasena.php?cod={$cod}&email={$email}'</p></body></html>";

                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= 'From: G26 <info@address.com>' . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $tema = "REESTABLECIMIENTO CONTRASEÑA.";
                mail($email,$tema,$msg,$header);
                echo "<h3 style=\"color: green\">Email enviado correctamente.</h3>";
                echo "Puede que reciba el mensaje en la carpeta Spam.";
            }
        ?>
        </section>
       
        <?php
            function generateRandomString($length = 10) {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
        ?>
    </body>
</html>