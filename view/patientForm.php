<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Registro do paciente</title>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<body class="back-img">
	<main class="text-dark">

		<h1 class="text-center mx-5 mt-5 header-style">Quer ser um paciente? Visualize os planos alimentares atribuídos a você, de forma simples na <a class="link-style" href="/">Sandbox</a>!</h1>

		<img src="../public/img/icon.svg" class="rounded mx-auto d-block" alt="Icon for Sandbox System">

		<div class="container bg-white mt-4 mb-4 rounded div-form">

			<!-- Default form subscription -->
			<form class="text-center border border-light p-5" action="../actions/patientRegister.php" method="POST">

			    <p class="h4 mb-4">Crie sua conta</p>

			    <p>
			    	Não é um paciente? Cadastre-se como <a class="link-style" href="nutriForm.php">nutricionista</a>!
			    </p>
				<?php if(isset($_GET['message'])):?>
					<div class="row w-auto mb-4 border border-<?php echo $_GET['validate']?> text-<?php echo $_GET['validate']?>">
						<span class="text-center"><?php echo $_GET['message'] ?></span>
			 		</div>
				<?php endif ?>
			    <!-- Name -->
			    <input type="text" name="name" class="form-control mb-4 input-style" placeholder="Nome" minlength=3 maxlength=45 required="true">

			    <!-- Email -->
			    <input type="email" name="email" class="form-control mb-4 input-style" placeholder="E-mail" required="true">

			    <!-- CPF -->
			    <input type="text" name="cpf" class="form-control mb-4 input-style" placeholder="CPF" minlength=11 maxlength=11 required="true">

				<!-- Date_birth-->
				<input type="date" name="date" class="form-control mb-4 input-style" required="true">

			    <!-- Weight -->
			    <input type="text" name="weight" class="form-control mb-4 input-style" placeholder="Peso" required="true">

				<!-- Height -->
			    <input type="text" name="height" class="form-control mb-4 input-style" placeholder="Altura" required="true">

				<!-- Objective -->
			    <input type="text" name="objective" class="form-control mb-4 input-style" placeholder="Objetivo" required="true">

			    <!-- Password -->
			    <input type="password" name="password" class="form-control mb-4 input-style" placeholder="Senha" required="true">

			    <!-- Confirm password -->
			    <input type="password" name="confirmPW" class="form-control mb-4 input-style" placeholder="Confirmar senha" minlength=8 required="true">

			    <!-- Sign in button -->
			    <button class="btn btn-info btn-block btn-style" type="submit">Cadastrar</button>

				<p class="mt-3">Já possui uma conta? Faça <a class="link-style" href="loginForm.php">Login</a>!</p>

			</form>
			<!-- Default form subscription -->

		</div>

	</main>
</body>

</html>