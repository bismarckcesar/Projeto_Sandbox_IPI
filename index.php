<?php 

if (!isset($_SESSION['user'])) {
 	header('location: view/loginForm.php');
}

header('location: view/home.php');

?>
