<?php
require_once('../model/conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$regNum = $_POST['regNum'];
$password = trim(sha1($_POST['password']));
$confirmPW = trim(sha1($_POST['confirmPW']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF`, `REGISTER_NUMBER` FROM `NUTRITIONISTS` WHERE (`CPF`=? OR `EMAIL`=? OR `REGISTER_NUMBER`=?)");
$stmt->execute([$cpf, $email, $regNum]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {
    
  header('location: ../view/nutriForm.php?erro=As senhas não coincidem');
  exit();
  
}else if($result['EMAIL'] == $email || $result2['EMAIL']){

    header('location: ../view/nutriForm.php?erro=E-mail ou CPF já cadastrado');  
    exit();

}  else if ($result['CPF'] == $cpf || $result2['CPF']) {
        
header('location: ../view/nutriForm.php?erro=E-mail ou CPF já cadastrado');
exit();

} else if ($result['REGISTER_NUMBER'] == $regNum ) {

header('location: ../view/nutriForm.php?erro=CRN inválida');
exit();
}
	
$stmt = $con->prepare('INSERT INTO NUTRITIONISTS(CPF, NAME, REGISTER_NUMBER, EMAIL, PASSWORD) VALUES(?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $regNum, $email, $password]);

header('location: ../view/nutriForm.php?erro=Nutricionista cadastrado com sucesso!');
exit();

 ?>