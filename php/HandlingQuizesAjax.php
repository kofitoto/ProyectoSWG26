<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html'?>
	<script src="../js/jquery-3.4.1.min.js"></script>
  	<!--<script src="../js/ShowImageInForm.js"></script>-->
  	<script src="../js/ValidateFieldsQuestion.js"></script>
    <script src="../js/AddQuestionsAjax.js"></script>
    <script src="../js/ShowQuestionsAjax.js"></script>
    <script src="../js/CountQuestions.js"></script>
    <script src="../js/reset.js"></script>
	<style>
		.table_QuestionForm {
			margin: auto;
		}
		sup {
			color: red;
		}
        #preguntas {
         overflow: scroll;
         height: 100%;
         width: 100%;
        }
	</style>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
        <div id="botones">
        <p>
        <input type="button" id="show_form" value="Insertar Preguntas" onclick="ensenarForm()">
        <input type="button" id="show_question" value="Ver Preguntas" onclick="visualizarTabla()">
        <input type="button" id="clean" value="Limpiar Pagina" onclick="reset()">
        </p>   
    </div>
         <div id="totaldePreguntas" class="tabla">
            <h3>Preguntas usuario/TOTAL</h3>
            <h4 id="preguntasTOTAL"><img src="../images/cargando.gif" width="100"> </h4>
        </div>
		<div id="formulario" style="display: none"> 
			<form id='fquestion' name='fquestion' method='POST' enctype='multipart/form-data'>
				<table class="table_QuestionForm">
					<tr>
						<th>
							<h2>Insertar pregunta</h2><br />
						</th>
					</tr>
					<tr>
						<td>Direccion de correo<sup>*</sup> <input type="text" size="50" id="dirCorreo" name="Direccion de correo"></td>
					</tr>
					<tr>
						<td>Enunciado de pregunta<sup>*</sup> <input type="text" size="75" id="pregunta" name="Pregunta"></td>
					</tr>
					<tr>
						<td>Respuesta correcta<sup>*</sup> <input type="text" size="75" id="respuestaCorrecta" name="Respuesta correcta"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 1<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta1" name="Respuesta incorrecta 1"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 2<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta2" name="Respuesta incorrecta 2"></td>
					</tr>
					<tr>
						<td>Respuesta incorrecta 3<sup>*</sup> <input type="text" size="75" id="respuestaIncorrecta3" name="Respuesta incorrecta 3"></td>
					</tr>
					<tr>
						<td>Tema<sup>*</sup> <input type="text" size="50" id="tema" name="tema"></td>
					</tr>
					<tr>
						<td>
							Complejidad<sup>*</sup>
							<select id="complejidad" name="complejidad">
								<option value="1">Baja</option>
								<option value="2" selected>Media</option>
								<option value="3">Alta</option>
							</select>
						</td>
					</tr>
                    <tr>
						<td><input type="file" id="file" accept="image/*" name="file">
							<div id="imgDynamica"></div>
						</td>
					</tr>
					<tr>
						<td><input type="button" id="submit" value="Enviar" onclick="anadirPregunta()"> 
                        <input type="reset" id="reset" value="Limpiar"></td>
					</tr>
				</table>
			</form>
		</div>
        <div id="preguntas">
        </div>
	</section>
    <?php include '../html/Footer.html' ?>
</body>

</html>