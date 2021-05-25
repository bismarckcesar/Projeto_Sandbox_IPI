<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Sandbox - cadastra-se como nutricionista</title>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>
	<link href="../public/css/personalized.css" rel="stylesheet"/>

</head>

<body class="back-img">
	<main class="text-dark">

		<h1 class="text-center mx-5 mt-5 header-style">É nutricionista? Gerencie os planos alimentares de seus pacientes de maneira rápida e simples na <a class="link-style" href="/">Sandbox</a>!</h1>

		<img src="../public/img/icon.svg" class="rounded mx-auto d-block" alt="Icon for Sandbox System">

		<div class="container bg-white mt-4 mb-4 rounded div-form">

			<!-- Default form subscription -->
			<form class="border border-light p-5" action="../actions/nutriRegister.php" method="POST">

			    <p class="text-center h4 mb-4">Crie sua conta</p>

			    <p class="text-center">
			    	Não é nutricionista? Cadastre-se como <a class="link-style" href="patientForm.php">paciente</a>!
			    </p>
				<?php if(isset($_GET['message'])):?>
					<div class="mb-4 border rounded border-<?php echo $_GET['validate']?> text-<?php echo $_GET['validate']?>">
						<p class="text-center my-0 py-1"><span><?php echo $_GET['message']; ?></span></p>
			 		</div>
				<?php endif ?>

			    <!-- Name -->
			    <label for="name">Nome:</label><input type="text" id="name" name="name" class="form-control mb-4 input-style" placeholder="Digite seu nome" minlength=3 maxlength=45 required="true">

			    <!-- Email -->
			    <label for="email">E-mail:</label><input type="email" id="email" name="email" class="form-control mb-4 input-style" placeholder="Digite seu e-mail" required="true">

			    <!-- CPF -->
			    <label for="cpf">CPF:</label><input type="text" id="cpf" name="cpf" class="form-control mb-4 input-style" placeholder="Digite o número do seu CPF" minlength=11 maxlength=11 required="true">

			    <!-- CRN -->
			    <label for="regNum">CRN:</label><input type="text" id="regNum" name="regNum" class="form-control mb-4 input-style" placeholder="Digite o número do seu CRN" minlength=4 maxlength=4 required="true">

			    <!-- Password -->
			    <label for="password">Senha:</label><input type="password" id="password" name="password" class="form-control mb-4 input-style" placeholder="Crie uma senha com no mínimo 8 caracteres" minlength=8 required="true">
			    <!-- Confirm password -->
			    <label for="confirmPW">Confimar Senha:</label><input type="password" id="confirmPW" name="confirmPW" class="form-control mb-4 input-style" placeholder="Confirme sua senha" minlength=8 required="true">

			    <!-- Sign in button -->
			    <button class="btn btn-info btn-block btn-style" type="submit">Cadastrar</button>

				<p class="text-center mt-3">Já possui uma conta? Faça <a class="link-style" href="loginForm.php">Login</a>!</p>

			</form>
			<!-- Default form subscription -->

		</div>

	</main>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>