<?php 
    session_start();
    if($_REQUEST['cod']!=$_SESSION['codigo']){
        header("Location: ../html/Error.html");
    }
?>
<html>
    <head>
        <?php include '../html/Head.html';?>
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/CheckOnlyPass.js"></script>
        
    </head>
    <body>
        <?php include 'Menus.php'?>
        <section class="main" id="s1">
        <div id= gestion>
        </div>
        <form id="form">
            <h4>Direccion de Correo Electronico:</h4>
            <input type="email" name="email" id="dirCorreo" value=<?php echo $_REQUEST['email'];?> readonly required/><br>
            <h4>Nueva Contraseña:*</h4>
            <input type="password" size="30" name="pass" id="pass1" required/><br>
            <div id="divContra"></div>
            <h4>Repite la Contraseña:*</h4>
            <input type="password" size="30" name="pass2" id="pass2" required/><br>
            <button id="enviar" disabled>Enviar</button>
            <div id="resul"></div>
            </form>

        </section>
    </body>
</html>