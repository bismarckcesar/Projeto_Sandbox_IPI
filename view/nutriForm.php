<!DOCTYPE html>
<html>
<head>
	<title>Registro do nutricionista</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet"/>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>
<?php 

$error=$_GET['erro'];

?>

<body style="background-image: url(../public/img/background.jpg); background-size: 100%; background-repeat: no-repeat;">
	<main class="text-dark">

		<h1 class="text-center mx-5 mt-5" style="font-size: 30px">É nutricionista? Gerencie os planos alimentares de seus pacientes de maneira rápida e simples na <u><a style="color: #5986af" href="#">Sandbox</a></u>!</h1>

		<div class="container bg-white mt-4 mb-4 rounded" style="width: 40%; height: 40%; border: 5px solid #5986af">

			<!-- Default form subscription -->
			<form class="text-center border border-light p-5" action="../actions/nutriRegister.php" method="POST">

			    <p class="h4 mb-4">Crie sua conta</p>

			    <p>
			    	Não é nutricionista? <u><a style="color: #5986af" href="#">Cadastre-se como paciente</a></u>!
			      
			    </p>

			    <!-- Name -->
			    <input type="text" name="name" id="defaultSubscriptionFormPassword" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="Nome" minlength=3 maxlength=45>

			    <!-- Email -->
			    <input type="email" name="email" id="defaultSubscriptionFormEmail" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="E-mail">

			    <!-- CPF -->
			    <input type="text" name="cpf" id="defaultSubscriptionFormEmail" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="CPF" minlength=11 maxlength=11>

			    <!-- CRN -->
			    <input type="text" name="regNum" id="defaultSubscriptionFormPassword" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="CRN" minlength=4 maxlength=4>

			    <!-- Password -->
			    <input type="password" name="password" id="defaultSubscriptionFormEmail" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="Senha" minlength=8>

			    <!-- Confirm password -->
			    <input type="password" name="confirmPW" id="defaultSubscriptionFormPassword" class="form-control mb-4" style="border: 1px solid #5986af" placeholder="Confirmar senha" minlength=8>

			    <!-- Sign in button -->
			    <button class="btn btn-info btn-block" style="background-color: #5986af; border: 1px solid black" type="submit">Cadastrar</button>

				<p class="mt-3">Já possui uma conta? Faça <u><a style="color: #5986af" href="loginForm.php">Login</a></u>!</p>

			</form>
			<!-- Default form subscription -->

		</div>

	</main>
</body>

</html>