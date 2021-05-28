<?php

	if(isset($nutritionists)){
		$stmt = $con->prepare("SELECT * FROM EATING_PLANS WHERE NUTRITIONIST_ID = ? ORDER BY DATE_START");
		$stmt->execute([$_SESSION['user_id']]);		
	}else {		
		$stmt = $con->prepare("SELECT * FROM EATING_PLANS WHERE PATIENT	_ID = ? ORDER BY DATE_START");
		$stmt->execute([$_SESSION['user_id']]);
	}
?>

<h2 class="mb-5"> Planos Alimentares </h2>

<!-- Start of the eating_plans while -->
<?php while($eating_plans = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

	<?php
		if(isset($nutritionists)){
			$stmt1= $con->prepare('SELECT * FROM PATIENTS WHERE ID = ?');
			$stmt1->execute([$eating_plans['PATIENT_ID']]);
			$patient = $stmt1->fetch(PDO::FETCH_ASSOC);	
		} else{
			$stmt1= $con->prepare('SELECT * FROM NUTRITIONISTS WHERE ID = ?');
			$stmt1->execute([$eating_plans['NUTRITIONIST_ID']]);
			$nutritionist = $stmt1->fetch(PDO::FETCH_ASSOC);			
		}
	?>

<table class="table table-light table-striped table-hover w-50 p-3 m-auto mb-4 border">
	<thead>
		<tr scope="row" class="border-bottom border-black">
			<th scope="col">Nutricionista: <?= $nutritionist['NAME'] ?? $_SESSION['user']?></th>
			<th scope="col">Paciente: <?= $patient['NAME'] ?? $_SESSION['user']?></th>
			<th scope="col"><a class="link-patient text-decoration-none" data-bs-toggle="modal" data-bs-target="#meals-<?=$eating_plans['ID']?>" style="cursor: pointer">Refeições</a></th>

			<?php if(isset($nutritionists) && empty($patients)): ?>
				<th scope="col">
				<a class="link-patient text-decoration-none" data-bs-toggle="modal" data-bs-target="#eatPlans-<?=$eating_plans['ID']?>" style="cursor: pointer">Editar</a>
			<?php endif ?>

			</th>
		</tr>
	</thead>
	<tbody>
	<tr scope="row"><td>Data de início</td><td class="text-center" colspan="3"><?=$eating_plans['DATE_START']?></td></tr>
	<tr scope="row"><td>Data de Termino</td><td class="text-center" colspan="3"><?=$eating_plans['DATE_FINISH']?></td></tr>
	<tr scope="row"><td>Objetivo</td><td class="text-center" colspan="3"><?=$eating_plans['OBJECTIVE']?></td></tr>
	</tbody>	
</table>

<!-- Modal Edit -->
<div class="modal fade" id="eatPlans-<?=$eating_plans['ID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content border">
			<form action="#">
				<div class="modal-header bg-primary border-bottom-light">
					<h5 class="modal-title text-light" id="exampleModalLabel">Edição de planos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

				<?php
					$eat_id = $eating_plans['ID'];
				?>

					<input type="checkbox" class="d-none" name="eatPlan_id" checked value="<?= $eat_id ?>">
					<label for="start-<?=$id?>">Data de início:</label><input type="date" id="start-<?=$id?>" class="form-control mb-4 border-custom" name="initDate-<?=$id?>" placeholder="Data de Início" value="<?=$eating_plans['DATE_START']?>" required>
					<label for="finish-<?=$id?>">Data de Fim:</label><input type="date" id="finish-<?=$id?>" class="form-control mb-4 border-custom" name="finishDate-<?=$id?>" placeholder="Data de Fim" value="<?=$eating_plans['DATE_FINISH']?>" required>
					<label for="objective-<?=$id?>">Objetivo:</label><input type="text" id="objective-<?=$id?>" class="form-control mb-4 border-custom" name="objective-<?=$id?>" placeholder="Objetivo" value="<?=$eating_plans['OBJECTIVE']?>">

				</div>
				<div class="modal-footer">
				<a href="../actions/deletePlans.php?id=<?=$eat_id?>" class="text-danger text-decoration-none" style="cursor: pointer">Excluir</a>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Modal Meals -->
<div class="modal fade" id="meals-<?=$eating_plans['ID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header bg-primary border-bottom-light">
				<h5 class="modal-title text-light" id="exampleModalLabel">Refeições</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

			<?php 
				$stmt2 = $con->prepare("SELECT * FROM MEALS WHERE EATING_PLANS_ID = ?");
				$stmt2->execute([$eating_plans['ID']]);
			?>

			<!-- Start of the meals while -->
			<?php while($meals = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>

				<?php 
					$id = $meals['ID'];
					$id1 = "meal-edit-".$meals['ID'];
					$id2 = "weight-edit-".$meals['ID'];
					$id3 = "btn-".$meals['ID'];
				?>

			<form action="#" method="POST">
				<input type="checkbox" class="d-none" name="meals-id-<?= $id?>" checked value="<?= $id ?>">
				<table class="table table-light table-striped table-hover w-75 p-3 m-auto mb-4 border">
					<thead>
						<tr scope="row" class="border-bottom border-black">
							<th scope="col" class="text-center"></th>

						<?php if(isset($nutritionists)): ?>

							<th scope="col">
								<a href="../actions/deleteMeals.php?id=<?=$id?>" class="text-danger text-decoration-none" style="cursor: pointer">Excluir</a>
							</th>
							
						<?php else: ?>
						
							<th  colspan="1" class="text-start"><a class="text-primary text-decoration-none" style="cursor: pointer">Visualização</a></th>

						<?php endif ?>

						</tr>
					</thead>
					<tbody>
						<tr scope="row">
							<td>Refeição</td><td id="<?=$id1?>" class="text-center"><?=$meals['NAME']?></td>
						</tr>
						<tr scope="row">
							<td>Peso(g)</td><td id="<?=$id2?>" class="text-center"><?=$meals['WEIGHT']?></td>
						</tr>
					</tbody>

		<!-- End of the meals while -->
		<?php endwhile ?>

				</table>
			</form>

			<?php 

			$eatPlan = 'eatPlan-' . $eat_id;

			?>

			<form action="../actions/meals_register.php" id="<?= $eatPlan ?>" class="w- border border-light p-5" method="POST">
            <fieldset id="meals">
                <legend class="h6 mt-4 mb-4">Refeições</legend>

                <input type="hidden" name="plan_id" value="<?= $eat_id ?>">

                <label for="meal-1" id="label-1-1-<?= $id ?>">Refeição:</label>
                <input name="mealName-1" id="meal-1" class="form-control mb-4 border-custom" placeholder="Refeição" required="true">

                <label for="weight-1" id="label-2-1-<?= $id ?>">Peso:</label>
                <input name="mealWeight-1" id="weight-1" class="form-control mb-4 border-custom" placeholder="Peso em gramas" required="true">

                <?php
                	$idMeal = 'addMeal-' . $eat_id;
                ?>

                <button class="btn btn-primary d-inline-block col-1 " type="button" id="<?= $idMeal ?>" onClick="addMeal('<?= $idMeal ?>', '<?= $eat_id ?>', '<?= $eatPlan ?>')">+</button>
                <button class="btn btn-primary d-inline-block col-1" type="button" id="<?= $removeMeal ?>" onClick="removeMeal('<?= $eat_id ?>', '<?= $eatPlan ?>')">-</button>
            </fieldset>

            <button class="btn btn-primary mt-5">Salvar</button>
        </form>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- End of the eating_plans while -->
<?php endwhile?>
