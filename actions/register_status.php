<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Confirmação de cadastro</title>
</head>
<body>

	<?php 

	require_once('../model/conect.php');

	$user_id = $_GET['usr_id'];
	$cad_cod = $_GET['code'];
	$type = $_GET['type'];

	?>

	<?php if (isset($_GET['usr_id']) & isset($_GET['code'])): ?>

		<?php

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

			<h1>Cadastro concluído com sucesso! Aguarde 3 segundos, você será redirecionado para a página de login...</h1>
			
			<?php header('refresh:3; url = ../view/loginForm.php'); ?>


		<?php endif ?>

	<?php else: ?>

		<h1>Confirme seu cadastro através do link enviado por e-mail!</h1>

		<a href="../index.php">Voltar para a página inicial</a>
	
	<?php endif ?>

</body>
</html>