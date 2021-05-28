<?php

require_once('../actions/init.php');
require_once('../model/conect.php');

if (!isset($_SESSION['user'])) {
	header("location: loginForm.php");
}

$stmt = $con->prepare("SELECT * FROM NUTRITIONISTS WHERE (`ID` = ? AND `NAME` = ?)");
$stmt->execute([$_SESSION['user_id'], $_SESSION['user']]);
$nutritionists = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $con->prepare("SELECT * FROM PATIENTS WHERE (`ID` = ? AND `NAME` = ?)");
$stmt->execute([$_SESSION['user_id'], $_SESSION['user']]);
$patients = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="shortcut icon" href="../public/img/fav-icon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <title>Sandbox - seja bem-vindo!</title>
    
	<?php include 'header.php'; ?>

</head>

<body>
	<main class="vh-max">
		<div class="container" id="eat-plans" style="margin-top: 100px;">

			<?php include 'EatPlansView.php'; ?>
			
		</div>
	</main>

	<?php include 'footer.php'; ?>
	
</body>
</html>
