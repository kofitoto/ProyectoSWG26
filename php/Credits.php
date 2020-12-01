<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<?php include '../html/Head.html'?>
	<style>
		.table_Credits{
			margin: auto;
		}
		td {
  			width: 25%;
		}
		.autores {
  			width: 150px;
  			height: 150px;
		}
		h2 {
			color: darkblue;
		}
	</style>
</head>

<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
		<div>
			<table class="table_Credits">
			<tr><th colspan="2"><h2>DATOS DEL AUTOR/AUTORES</h2><br/></th ></tr>
				<tr>
					<td>Kofi Darko</td>
					<td>Endika Varas</td>
				</tr>
				<tr>
					<td>Ingereria de Software</td>
					<td>Ingenieria de Software</td>
				</tr >
				<tr>
					<td><img class="autores" src="../images/kofi.jpg" alt="autor 1"></td>
					<td><img class="autores" src="../images/endika.jpeg" alt="autor 2"></td>
				</tr>
				<tr>
					<td><a href="mailto:kdarko001@ikasle.ehu.eus">kdarko001@ikasle.ehu.eus</a></td>
					<td><a href="evaras003@ikasle.ehu.eus">evaras003@ikasle.ehu.eus</a></td>
				</tr>
				<tr><th colspan="2"><h2>TRABAJO REALIZADO DEBIDO A LA CESION DE AUTOR/AUTORES</h2><br/></th ></tr>
				<tr>
					<td>Konstantin Todorov Andreev</td>
					<td>Daniel Ruskov Vangelov</td>
				</tr>
				<tr>
					<td>Ingereria de Software</td>
					<td>Ingenieria de Computadores</td>
				</tr >
				<tr>
					<td><img class="autores" src="../images/aimg-1.jpeg" alt="autor 1"></td>
					<td><img class="autores" src="../images/aimg-2.jpeg" alt="autor 2"></td>
				</tr>
				<tr>
					<td><a href="mailto:kandreev001@ikasle.ehu.es">kandreev001@ikasle.ehu.es</a></td>
					<td><a href="mailto:druskov001@ikasle.ehu.es">druskov001@ikasle.ehu.es</a></td>
				</tr>
			</table>
		</div>
	</section>
	<?php include '../html/Footer.html' ?>
</body>

</html>