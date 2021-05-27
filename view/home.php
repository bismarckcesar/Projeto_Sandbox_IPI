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

    <title>Sandbox</title>

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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Nutritionist System</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<form action="../view/search.php" method="POST" class="input-group form-outline w-100">
			<label class="border"><input type="text" name="search" class="form-control w-100"></label>
			<button class="btn btn-primary"><i class="fas fa-search"></i></button>
		</form>

		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
				<?= $_SESSION['user'] ?> 
			</button>
	
			<ul class="dropdown-menu">
				<li><a class="dropdown-item" href="../actions/logout.php">Sair</a></li>
			</ul>
		</div>
	</nav>
	<div class="container" id="eat-plans">			
		<?php include 'EatPlansView.php';?>
	</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

	