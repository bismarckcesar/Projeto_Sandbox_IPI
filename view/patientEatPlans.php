<div class="container">	

		   	<table class="table caption-top table-striped table-hover p-3 m-auto mt-4 border">
			   <caption> <h2> Planos Alimentares </h2> </caption>
			    <thead>
					<tr scope="row" class="border-bottom border-black">
				 		<th scope="col">Data de Início</th>
				    	<th scope="col">Data de Encerramento</th>
				  		<th scope="col">Objetivo</th>
				  		<th scope="col">Nutricionista Responsável</th>
                        <th scope="col">Detalhes</th>
					</tr>
				</thead>
				<tbody>
				<?php $stmt = $con->prepare("SELECT EATING_PLANS.DATE_START,  EATING_PLANS.DATE_FINISH , EATING_PLANS.OBJECTIVE,NUTRITIONISTS.NAME FROM EATING_PLANS INNER JOIN NUTRITIONISTS ON EATING_PLANS.NUTRITIONIST_ID = NUTRITIONISTS.ID AND PATIENT_ID = ?  ORDER BY DATE_FINISH DESC");?>
				<?php $stmt->execute([$_SESSION['user_id']]);?>

				<?php while($eating_plans = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
					<tr scope="row">
				  		<td><?=$eating_plans['DATE_START']?></td>
				  		<td><?=$eating_plans['DATE_FINISH']?></td>
				  		<td><?=$eating_plans['OBJECTIVE']?></td>
				  		<td><?=$eating_plans['NAME']?></td>
                        <td><a href="#">icone</a></td>  
					</tr>
					<?php endwhile?>	
					
				</tbody>	
			</table>
		
		</div>