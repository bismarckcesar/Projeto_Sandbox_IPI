<?php
require_once('../conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$regNum = $_POST['regNum'];
$password = trim(sha1($_POST['password']));
$confirmPW = trim(sha1($_POST['confirmPW']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF`, `REGISTER_NUMBER` FROM `NUTRITIONISTS` WHERE `CPF`=?");
$stmt->execute([$cpf]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $con->prepare("SELECT `CPF` FROM `PATIENTS` WHERE `CPF`=?");
$stmt2->execute([$cpf]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {
    
  header('location: ../forms/nutriForm.php?erro=As senhas não coincidem');
  exit();
  
  }else if($result2['CPF'] == $cpf ){

    header('location: ../forms/nutriForm.php?erro=Usuário cadastrado como um paciente');
    exit();
    
  }else if($result['EMAIL'] == $email){

      header('location: ../forms/nutriForm.php?erro=Email indisponivel');  
      exit();

    }  else if ($result['CPF'] == $cpf) {
        
header('location: ../forms/nutriForm.php?erro=CPF inválido');
exit();

} elseif ($result['REGISTER_NUMBER'] == $regNum ) {

header('location: ../forms/nutriForm.php?erro=CRN inválida');
exit();
}
	
	$stmt = $con->prepare('INSERT INTO NUTRITIONISTS(CPF, NAME, REGISTER_NUMBER, EMAIL, PASSWORD) VALUES(?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $regNum, $email, $password]);

header('location: ../forms/nutriForm.php?erro=Nutricionista cadastrado com sucesso!');
exit();

 ?>