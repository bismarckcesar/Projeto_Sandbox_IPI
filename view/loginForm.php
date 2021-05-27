<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Sandbox - entre ou cadastre-se</title>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>

</head>

<body class="bg-img">
	<main class="text-dark">

		<h1 class="text-center mx-5 mt-5 h-custom">Olá, seja bem-vindo ao sistema de planos alimentares <a class="link-custom" href="sandbox.php" target="_blank">Sandbox</a>!</h1>

		<img src="../public/img/icon.png" class="icon-custom rounded mx-auto d-block" alt="Icon for Sandbox System">

		<div class="container bg-white mt-4 mb-4 rounded div-custom">

			<!-- Default form subscription -->
			<form class="border border-light p-5" action="../actions/auth.php" method="POST">

			    <p class="text-center h4 mb-4">Login</p>

				<?php if(isset($_GET['message'])):?>
					<div class="mb-4 border rounded border-<?php echo $_GET['validate']?> text-<?php echo $_GET['validate']?>">
						<p class="text-center my-0 py-1"><span><?php echo $_GET['message'] ?></span></p>
			 		</div>
				<?php endif ?>

			    <!-- Email -->
			    <label for="email" class="required-field">E-mail:</span></label><input type="email" id="email" name="email" class="form-control mb-4 border-custom required-field" placeholder="Digite seu e-mail" required="true">

			    <!-- Password -->
			    <label for="password">Senha:<span class="required-field"></span></label><input type="password" id="password" name="password" class="form-control mb-4 border-custom required-field" placeholder="Digite sua senha" minlength=8 required="true">

			    <!-- Sign in button -->
			    <button class="btn btn-info btn-block btn-custom" type="submit">Entrar</button>

				<p class="text-center mt-3">Ainda não possui uma conta? Cadastre-se como <a class="link-custom" href="nutriForm.php">nutricionista</a> ou <a class="link-custom" href="patientForm.php">paciente</a>!</p>

			</form>
			<!-- Default form subscription -->

		</div>

	</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>