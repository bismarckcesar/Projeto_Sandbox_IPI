<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Registro do nutricionista</title>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>


</head>


<body class="back-img">
	<main class="text-dark">

		<h1 class="text-center mx-5 mt-5 header-style">Olá, seja bem-vindo ao sistema de planos alimentares <a class="link-style" href="/">Sandbox</a>!</h1>

		<img src="../public/img/icon.svg" class="rounded mx-auto d-block" alt="Icon for Sandbox System">

		<div class="container bg-white mt-4 mb-4 rounded div-form">

			<!-- Default form subscription -->
			<form class="text-center border border-light p-5" action="../actions/auth.php" method="POST">

			    <p class="h4 mb-4">Login</p>

				<?php if(isset($_GET['message'])):?>
					<div class="row w-auto mb-4 border border-<?php echo $_GET['validate']?> text-<?php echo $_GET['validate']?>">
						<span class="text-center"><?php echo $_GET['message'] ?></span>
			 		</div>
				<?php endif ?>

			    <!-- Email -->
			    <label for="email">E-mail</label><input type="email" id="email" name="email" class="form-control mb-4 input-style" placeholder="E-mail" required="true">

			    <!-- Password -->
			    <label for="password">Senha</label><input type="password" id="password" name="password" class="form-control mb-4 input-style" placeholder="Senha" minlength=8 required="true">

			    <!-- Sign in button -->
			    <button class="btn btn-info btn-block btn-style" type="submit">Entrar</button>

				<p class="mt-3">Ainda não possui uma conta? cadastre-se já!</p>
				<p>Como <a class="link-style" href="nutriForm.php">nutricionista</a> ou um dos nossos <a class="link-style" href="patientForm.php">pacientes</a>!</p>

			</form>
			<!-- Default form subscription -->

		</div>

	</main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>