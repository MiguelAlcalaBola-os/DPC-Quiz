<?php
/*Oculta el error al direccionar la pagina*/
error_reporting(0);
/*Hace la validacion cuando se selecciona un modulo*/
$p = $_GET['p'];
/*Determina si el modulo existe y si no mandar al modulo principal*/
if (!isset($p)) {
	$p = "home";
} else {
	$p = $p;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cuest</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/properties.css">
	<link rel="stylesheet" type="text/css" href="assets/css/footer.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
</head>

<body style="background-color: rgb(180, 246, 251)">
<nav class="navbar navbar-default" style="background-color: #1A1A1A;">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="?p=respuestas_indice_estudiante" style="color: rgb(0, 197, 207); font-size: 17px"> |Cuestionarios| </a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="../mindMap2.php" style="color: rgb(0, 197, 207)">|Generador de mapas mentales| <span class="sr-only">(current)</span></a></li>
				
					<li><a href="../terminosdeuso.html" style="color: rgb(0, 197, 207); margin-left: 500px"> |DPC-Quiz| <span class="sr-only">(current)</span></a></li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
	<div class="container">
		<!-- block del modulo -->
		<?php
		/*Busca en la carpeta los modulos seleccionados y los muestra en el cuerpo de la pagina*/
		if (file_exists("modulos/" . $p . ".php")) {
			include "modulos/" . $p . ".php";
		} else {
			/* Mostramos la pagina para indicar  */
			echo "No se encontro el modulo especificado";
		}
		?>
		<!-- //block del modulo -->
	</div>

	<footer class="footer text-center">
		<div class="container">
			<span class="text-muted">
				<p>Bienvenido: <a target="_blank">Estudiante</a></p>
				
			</span>
		</div>
	</footer>
	<script src="assets/js/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
</body>

</html>