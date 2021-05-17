<?php 

$name= $_POST['name'];
$cpf= $_POST['cpf'];
$email= $_POST['email'];
$register= $_POST['register'];
$password= $_POST['password'];
$confirmPW= $_POST['confirmPW'];



require '../conect.php';

$stmt= $con->prepare("SELECT * FROM NUTRITIONISTS WHERE EMAIL=?");
$stmt->execute([$email]);

$stmt2= $con->prepare("SELECT * FROM NUTRITIONISTS WHERE CPF=?");
$stmt2->execute([$cpf]);

$stmt3= $con->prepare("SELECT * FROM NUTRITIONISTS WHERE REGISTER_NUMBER=?");
$stmt3->execute([$register]);

 if($stmt->rowcount()>0){

      header('location: ../formularios/nutriForm.php?erro=Email indisponivel');  
        exit();

} else if ( $password != $confirmPW) {

header('location: ../formularios/nutriForm.php?erro=As senhas não coincidem');
exit();

} else if ($stmt2->rowcount()>0) {

header('location: ../formularios/nutriForm.php?erro=CPF inválido');
exit();

} elseif ($stmt3->rowcount()>0) {

header('location: ../formularios/nutriForm.php?erro=Numero de Registro inválido');
exit();
}
	
	$stmt = $con->prepare('INSERT INTO NUTRITIONISTS(CPF,NAME,REGISTER_NUMBER,EMAIL,PASSWORD) VALUES (?,?,?,?,?);');
$stmt->execute([$cpf,$name,$register,$email,$password]);





 ?>