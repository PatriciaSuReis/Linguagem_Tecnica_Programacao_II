
<!DOCTYPE html>
<!-- form_alteracao.html -->
<?php
// examine como foi implementado a alteração da tb_aluno
// para implementar a alteração a sugestão é receber apenas o "id"
// use a função recupera_curso($id) que deve ser criada dentro do arquivo /inc/funcoes.inc.php

include "../inc/conectabd.inc.php";
include "../inc/funcoes.inc.php";

$id = $_GET["id"];
$curso = recupera_curso($id);

?>

<html>
	<head>
	  <title>Cadastro de curso</title>
	  <meta charset="utf-8">
	</head>
	<body>
		<h1>Atualizar curso</h1>
		<form action="alteracao_curso.php" method="GET">
			  
			<input type="hidden" name="id" value="<?php echo $curso["id_curso"]; ?>">

			<label for="ds_curso">Curso: </label>
			<input type="text" name="curso" id="ds_curso" value="<?php echo $curso["ds_curso"]; ?>">
			<br>

			<label for="nr_carga_horaria">Carga Horária:</label>
			<input type="text" name="nr_carga_horaria" id="nr_carga_horaria" value="<?php echo $curso["nr_carga_horaria"]; ?>">
			<br>

			<label for="dt_inicio">Data de Início:</label>
			<input type="text" name="dt_inicio" id="dt_inicio" value="<?php echo $curso["dt_inicio"]; ?>">
			<br>

			<input type="submit" value="Ok">
		</form>
	</body>
</html>