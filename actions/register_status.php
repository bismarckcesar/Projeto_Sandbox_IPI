<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sandbox - confirmação de cadastro</title>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>

</head>
<body class= "bg-img">
	
	<?php require_once('../model/conect.php'); ?>

	<?php if (isset($_GET['usr_id']) & isset($_GET['code'])): ?>

		<?php

		$user_id = $_GET['usr_id'];
		$cad_cod = $_GET['code'];
		$type = $_GET['type'];

		if ($type == 'nutritionist') {

			$stmt = $con->prepare(" SELECT * FROM `NUTRITIONISTS`  WHERE (`ID` = ?)");

		} else if ($type == 'patient') {

			$stmt = $con->prepare(" SELECT * FROM `PATIENTS`  WHERE (`ID` = ?)");
		}

		$stmt->execute([$user_id]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		?>

		<?php if ($cad_cod == $user['VALIDATION_CODE']): ?>

			<?php

			if ($type == 'nutritionist') {

				$stmt = $con->prepare("
					UPDATE NUTRITIONISTS
					SET EMAIL_VALIDATED = ?
					WHERE ID = ?");
				$stmt->execute([true, $user_id]);				
				
			} else if ($type == 'patient') {

				$stmt = $con->prepare("
					UPDATE PATIENTS
					SET EMAIL_VALIDATED = ?
					WHERE ID = ?");
				$stmt->execute([true, $user_id]);
			
			}

			?>
			<div class="container div-custom pt-3 rounded bg-light text-center mt-5">
				<img src="../public/img/icon.png" class="icon-custom mb-2">
				<h3 class="text-center text-dark">Cadastro concluído com sucesso! Aguarde 5 segundos, você será redirecionado para a página de login...</h3>
				<img src="../public/img/email.png" class="img-envelope pb-3">
			</div>
			
			<?php header('refresh:5; url = ../view/loginForm.php'); ?>

		<?php endif ?>

	<?php else: ?>

	<div class="container div-custom pt-3 rounded bg-light text-center mt-5">
		<img src="../public/img/icon.png" class="icon-custom mb-2">
		<h3 class="text-center text-dark">Confirme seu cadastro através do link enviado por e-mail!</h3>
		<img src="../public/img/email.png" class="img-envelope">
		<p><a class="link-custom" href="../index.php">Voltar para a página inicial</a></p>
	</div>

	<?php endif ?>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>