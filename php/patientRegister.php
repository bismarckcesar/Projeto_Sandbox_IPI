<?php
require_once('../conect.php');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$date = $_POST['date'];
$weight = floatval(trim(str_replace(',', '.', $_POST['weight'])));
$height = floatval(trim(str_replace(',', '.', $_POST['height'])));
$objective = $_POST['objective'];
$password = trim(sha1($_POST['password']));
$confirmPW = trim(sha1($_POST['confirmPW']));

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `NUTRITIONISTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT `EMAIL`, `CPF` FROM `PATIENTS` WHERE (`CPF`=? OR `EMAIL`=?)");
$stmt->execute([$cpf, $email]);
$result2 = $stmt->fetch(PDO::FETCH_ASSOC);

if ( $password != $confirmPW) {
    
  header('location: ../forms/patientForm.php?erro=As senhas não coincidem');
  exit();
  
  }else if($result2['EMAIL'] == $email || $result['EMAIL']){

      header('location: ../forms/patientForm.php?erro=E-mail ou CPF já cadastrado');  
      exit();

    }else if ($result2['CPF'] == $cpf || $result['CPF']) {
        
header('location: ../forms/patientForm.php?erro=E-mail ou CPF já cadastrado');
exit();

}
	
$stmt = $con->prepare('INSERT INTO PATIENTS(CPF, NAME, DATE_BIRTH, WEIGHT, HEIGHT, OBJECTIVE, PASSWORD, EMAIL) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([$cpf, $name, $date, $weight, $height, $objective, $password, $email]);

header('location: ../forms/patientForm.php?erro=Paciente cadastrado com sucesso!');
exit();

 ?>