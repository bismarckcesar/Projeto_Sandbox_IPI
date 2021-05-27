<?php
	$stmt = $con->prepare("SELECT EATING_PLANS.DATE_START,  EATING_PLANS.DATE_FINISH , EATING_PLANS.OBJECTIVE, EATING_PLANS.ID, NUTRITIONISTS.NAME, PATIENTS.CPF FROM EATING_PLANS INNER JOIN NUTRITIONISTS INNER JOIN PATIENTS ON (EATING_PLANS.NUTRITIONIST_ID = ? AND EATING_PLANS.PATIENT_ID = PATIENTS.ID) OR (EATING_PLANS.NUTRITIONIST_ID = NUTRITIONISTS.ID AND EATING_PLANS.PATIENT_ID = ?) ORDER BY DATE_START");
	$stmt->execute([$_SESSION['user_id'], $_SESSION['user_id']]);
?>

<h2> Planos Alimentares </h2>

<?php while($eating_plans = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
	<?php
		$stmt1= $con->prepare('SELECT * FROM PATIENTS WHERE CPF = ?');
		$stmt1->execute([$eating_plans['CPF']]);
		$patient = $stmt1->fetch(PDO::FETCH_ASSOC);
	 ?>
	<table class="table table-light table-striped table-hover w-50 p-3 m-auto mb-4 border">
		<thead>
			<tr scope="row" class="border-bottom border-black">
				<th scope="col">Nutricionista: <?php echo $eating_plans['NAME'] ?></th>
				<th scope="col">Paciente: <?php echo $patient['NAME'] ?></th>
				<th scope="col"><a class="link-patient" style="cursor: pointer">Editar</a></th>
				<th scope="col"><a class="link-patient" style="cursor: pointer">Refeições</a></th>
			</tr>
		</thead>
		<tbody>
		<tr scope="row"><td>Data de início</td><td class="text-center" colspan="3"><?=$eating_plans['DATE_START']?></td></tr>
		<tr scope="row"><td>Data de Termino</td><td class="text-center" colspan="3"><?=$eating_plans['DATE_FINISH']?></td></tr>
		<tr scope="row"><td>Objetivo</td><td class="text-center" colspan="3"><?=$eating_plans['OBJECTIVE']?></td></tr>
		</tbody>	
	</table>
<?php endwhile?>
				<!-- <?//php 
					//$stmt2 = $con->prepare("SELECT * FROM MEALS WHERE EATING_PLANS_ID = ?");
					//$stmt2->execute([$eating_plans['ID']]); -->
				?>
				<?php //while($meals = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
					<tr><td><?//php echo $meals['NAME'] ?></td></tr>
					<tr><td><?//php echo $meals['WEIGHT'] ?></td></tr>
				<?php //endwhile ?>