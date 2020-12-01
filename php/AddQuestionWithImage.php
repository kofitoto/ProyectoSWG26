<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <?php include 'CheckSesion.php'?>
  <style>
    .error {
      color: darkred;
    }
    .success {
      color: darkgreen;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
      <!--Código PHP para añadir una pregunta con imagen-->
      <br/>
      <?php
        // Validacion como en ValidateFieldsQuestion.js
        $exprMail = "/((^[a-zA-Z]+(([0-9]{3})+@ikasle\.ehu\.(eus|es))$)|^[a-zA-Z]+(\.[a-zA-Z]+@ehu\.(eus|es)|@ehu\.(eus|es))$)/";
        $longPregunta = "/^.{10,}$/";
        $mail = $_REQUEST['Direccion_de_correo'];
        $preg = $_REQUEST['Pregunta'];
        $corr = $_REQUEST['Respuesta_correcta'];
        $incorr1 = $_REQUEST['Respuesta_incorrecta_1'];
        $incorr2 = $_REQUEST['Respuesta_incorrecta_2'];
        $incorr3 = $_REQUEST['Respuesta_incorrecta_3'];
        $complejidad = $_REQUEST['complejidad'];
        $tema = $_REQUEST['tema'];
        $imagen = $_FILES['file']['tmp_name'];

        if(!isset($mail, $preg, $corr, $incorr1, $incorr2, $incorr3, $complejidad, $tema)) {
          echo "<p class=\"error\">PHP error: variables indefinidas. Rellene bien el formulario<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if(empty($mail) || empty($preg) || empty($corr) || empty($incorr1) || empty($incorr2) || empty($incorr3) || empty($complejidad) || empty($tema)) {
          echo "<p class=\"error\">¡Complete todos los campos obligatorios (*)!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if(!preg_match($exprMail, $mail)) {
          echo "<p class=\"error\">¡Formato de correo electronico invalido!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else if(!preg_match($longPregunta, $preg)) {
          echo "<p class=\"error\">¡Se necesita pregunta con longitud minima de 10 caracteres!<p><br/>";
          echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
        } else {
          // Realizar conexion php
          $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
          if (!$mysqli) {
            die("Fallo al conectar a MySQL: " . mysqli_connect_error());
            echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
          }
          // echo "Connection OK.";
          // Operar con la BD
          if ($imagen != "" ) { // same as isset($imagen)
            $imagen_b64 = base64_encode(file_get_contents($imagen));
            //$sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$_REQUEST[Direccion_de_correo]', '$_REQUEST[Pregunta]', '$_REQUEST[Respuesta_correcta]', '$_REQUEST[Respuesta_incorrecta_1]', '$_REQUEST[Respuesta_incorrecta_2]', '$_REQUEST[Respuesta_incorrecta_3]', '$_REQUEST[complejidad]', '$_REQUEST[tema]', '$imagen_b64');";
            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema, imagen) VALUES('$mail', '$preg', '$corr', '$incorr1', '$incorr2', '$incorr3', '$complejidad', '$tema', '$imagen_b64');";
          } else {
            //$sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$_REQUEST[Direccion_de_correo]', '$_REQUEST[Pregunta]', '$_REQUEST[Respuesta_correcta]', '$_REQUEST[Respuesta_incorrecta_1]', '$_REQUEST[Respuesta_incorrecta_2]', '$_REQUEST[Respuesta_incorrecta_3]', '$_REQUEST[complejidad]', '$_REQUEST[tema]');";
            $sql = "INSERT INTO preguntas(email, enunciado, respuestac, respuestai1, respuestai2, respuestai3, complejidad, tema) VALUES('$mail', '$preg', '$corr', '$incorr1', '$incorr2', '$incorr3', '$complejidad', '$tema');";
          }
          if(!mysqli_query($mysqli, $sql)) {
            die("Fallo al insertar en la BD: " . mysqli_error($mysqli));
            echo "<span><a href='javascript:history.back()'>Volver al formulario</a></span>";
          } else {
                // Cerrar conexión
                mysqli_close($mysqli);
                // echo "Close OK.";
            //AÑADIMOS LA PREGUNTA AL FICHERO XML
               $Fichero_xml = simplexml_load_file('../xml/Questions.xml');

                if($Fichero_xml!=false){
                    
                  $assessmentItem = $Fichero_xml->addChild('assessmentItem');
                  $assessmentItem->addAttribute('subject', $_POST['tema']);
                  $assessmentItem->addAttribute('author', $_POST['Direccion_de_correo']);
            
                  $itembody = $assessmentItem->addChild('itemBody');
                  $itembody->addChild('p', $_POST['Pregunta']);
                    
                  $correctResponse = $assessmentItem->addChild('correctResponse');
                  $correctResponse->addChild('response', $_POST['Respuesta_correcta']);
                    
                  $incorrectResponses = $assessmentItem->addChild('incorrectResponses');
                  $incorrectResponses->addChild('response', $_POST['Respuesta_incorrecta_1']);
                  $incorrectResponses->addChild('response', $_POST['Respuesta_incorrecta_2']);
                  $incorrectResponses->addChild('response', $_POST['Respuesta_incorrecta_3']);
                    
                  $Fichero_xml->asXML('../xml/Questions.xml');
                    echo "pregunta añadida al xml Preguntas";

                }
                else{
                    echo "Error al añadir";
                }

              }
              
            echo "<script> alert(\"Pregunta guardada en la BD\"); document.location.href='QuestionFormWithImage.php?logInMail=$logInMail'; </script>";
          }
      ?>
      <br/>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
