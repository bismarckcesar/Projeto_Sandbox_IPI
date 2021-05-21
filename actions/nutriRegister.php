<?php
require_once('../model/conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$regNum = $_POST['regNum'];
$password = sha1(trim($_POST['password']));
$confirmPW = sha1(trim($_POST['password']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF`, `REGISTER_NUMBER` FROM `NUTRITIONISTS` WHERE (`CPF`=? OR `EMAIL`=? OR `REGISTER_NUMBER`=?)");
$stmt->execute([$cpf, $email, $regNum]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {
    
  header("location: ../view/nutriForm.php?message=As senhas não coincidem!&validate=danger");
  exit();
  
}else if($result['EMAIL'] == $email || $result2['EMAIL']){

  header('location: ../view/nutriForm.php?message=E-mail ou CPF já cadastrado!&validate=danger');  
  exit();

}  else if ($result['CPF'] == $cpf || $result2['CPF']) {
        
  header('location: ../view/nutriForm.php?message=E-mail ou CPF já cadastrado!&validate=danger'); 
  exit();

} else if ($result['REGISTER_NUMBER'] == $regNum ) {

header('location: ../view/nutriForm.php?message=CRN inválida!&validate=danger');
exit();
}
	
$stmt = $con->prepare('INSERT INTO NUTRITIONISTS(CPF, NAME, REGISTER_NUMBER, EMAIL, PASSWORD) VALUES(?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $regNum, $email, $password]);

header('location: ../view/nutriForm.php?message=Nutricionista cadastrado com sucesso!&validate=success');
exit();

 ?>