<!DOCTYPE html>
<html>
<head>
	<title>Registro do nutricionista</title>
</head>
<?php 

$error=$_GET['erro'];

 ?>
<body>
	<form method="POST" action="../actions/nutriRegister.php">
		<label>Nome:<input type="text" name="name" placeholder="Nome" minlength=3 maxlength=45></label>
		<label>E-mail:<input type="email" name="email" placeholder="example@email.com"></label>
		<label>CPF:<input type="text" name="cpf" placeholder="000.000.000-00" minlength=11 maxlength=11></label>
		<label>CRN:<input type="text" name="regNum" placeholder="Nº de Registro" minlength=4 maxlength=4></label>
		<label>Senha:<input type="password" name="password" placeholder="Senha" minlength=8></label>
		<label>Confirmar Senha:<input type="password" name="confirmPW" placeholder="Confirmar Senha" minlength=8></label>
		<input type="submit" name="Confirmar">
	</form>
</body>
</html>