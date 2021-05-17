<?php 

$error=$_GET['erro'];

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Registrar-se com Nutricionista</title>
</head>
<body>
	<form method="POST" action="../php/nutriBack.php">
		<label>Nome:<input type="text" name="name" placeholder="Nome"></label>
		<label>CPF:<input type="text" name="cpf" placeholder="000.000.000-00" maxlength="11"></label>
		<label>E-mail:<input type="text" name="email" placeholder="example@email.com"></label>
		<label>Registro:<input type="text" name="register" placeholder="Nº de Registro"></label>
		<label>Senha:<input type="password" name="password" placeholder="Senha"></label>
		<label>Confirmar Senha:<input type="password" name="confirmPW" placeholder="Confirmar Senha"></label>
		<input type="submit" name="Confirmar">
	</form>
</body>
</html>