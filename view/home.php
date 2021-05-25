<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>

    <title>Registro do nutricionista</title>

</head>
<?php

require_once('../actions/init.php');
require_once('../model/conect.php');

if (!isset($_SESSION['user'])) {
	header("location: loginForm.php");
}

$stmt = $con->prepare("SELECT * FROM NUTRITIONISTS WHERE (`ID` = ? AND `NAME` = ?)");
$stmt->execute([$_SESSION['user_id'], $_SESSION['user']]);
$nutritionists = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT * FROM PATIENTS WHERE (`ID` = ? AND `NAME` = ?)");
$stmt->execute([$_SESSION['user_id'], $_SESSION['user']]);
$patients = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<body>

<nav id="menu">
	<?= $_SESSION['user'] ?> 
	<a href="../actions/logout.php">Sair</a>

	<form action="../actions/search.php" method="POST">
		<label>Pesquisar: <input type="text" name="search"></label>
		<button>Pesquisar</button>
	</form>
</nav>

<div id="form-eat-plan">
	<h2>Registro do plano alimentar</h2>
	<form action="../actions/eatplanRegister.php" id="eat-plan" method="POST">
		<fieldset>
		<legend>Dados do plano</legend>
			<label>Data de início: <input type="date" name="initDate" placeholder="Data de Início" required></label>
			<label>Data de Fim: <input type="date" name="finishDate" placeholder="Data de Fim" required></label>
			<label>Objetivo: <input type="text" name="objective" placeholder="Objetivo"></label>
		</fieldset>
		<fieldset id="meals">
		<legend>Refeições</legend>
			<input name="mealName-1" id="meal-1" placeholder="Refeição" required="true">
			<input name="mealWeight-1" id="weight-1" placeholder="Peso em gramas" required="true">
			<input type="button" id="addmeal" value="+" onClick="addMeal()">
			<input type="button" id="removemeal" value="-" onClick="removeMeal()">
		</fieldset>

		<button>Criar Plano</button>
	</form>
	
</div>	

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="../public/js/functions.js"></script>
	