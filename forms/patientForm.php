<!DOCTYPE html>
<html>
<head>
	<title>Registro do paciente</title>
</head>
<?php 

$error=$_GET['erro'];

 ?>
<body>
<form method="POST" action="../php/patientRegister.php">
		<label>Nome:<input type="text" name="name" placeholder="Nome" minlength=3 maxlength=45></label>
		<label>E-mail:<input type="email" name="email" placeholder="example@email.com"></label>
		<label>CPF:<input type="text" name="cpf" placeholder="000.000.000-00" minlength=11 maxlength=11></label>
		<label>Data de nascimento:<input type="date" name="date"></label>
		<label>Peso:<input type="text" name="weight"></label>
		<label>Altura:<input type="text" name="height"></label>
		<label>Objetivo com alimentação:<input type="text" name="objective"></label>
		<label>Senha:<input type="password" name="password" placeholder="Senha" minlength=8></label>
		<label>Confirmar Senha:<input type="password" name="confirmPW" placeholder="Confirmar Senha" minlength=8></label>
		<input type="submit" name="Confirmar">
</body>
</html>