<?php
require_once('../conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$password = trim(sha1($_POST['password']));
$confirmPW = trim(sha1($_POST['confirmPW']));

$stmt = $con->prepare("SELECT `REGISTER_NUMBER` FROM `NUTRITIONISTS` WHERE `CPF`=?");
$stmt->execute([$cpf]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt2 = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE `CPF`=?");
$stmt2->execute([$cpf]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {
    
  header('location: ../forms/patientForm.php?erro=As senhas não coincidem');
  exit();
  
  }else if($result['REGISTER_NUMBER']){

    header('location: ../forms/patientForm.php?erro=Usuário cadastrado como um nutricionista');
    exit();

  }else if($result2['EMAIL'] == $email){

      header('location: ../forms/patientForm.php?erro=Email indisponivel');  
      exit();

    }  else if ($result2['CPF'] == $cpf) {
        
header('location: ../forms/patientForm.php?erro=CPF inválido');
exit();

}
	
	$stmt = $con->prepare('INSERT INTO PATIENTS(CPF, NAME, PASSWORD, EMAIL) VALUES (?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $password, $email]);

header('location: ../forms/patientForm.php?erro=Paciente cadastrado com sucesso!');
exit();

 ?>