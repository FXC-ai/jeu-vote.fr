
<div class="row">
	<div class = "col-md-2">
		<a href="/politics/">--Retour à la page d'acceuil.</a>
	</div>
</div>

<div class="row">
	<div class = "col-md-10">
		<p><?php if (isset($msgErreur)) {echo $msgErreur;}?></p>
	</div>
</div>

<div class="row">
	<div class = "col-md-10">
		<table class="table table-bordered">

		
		<?php if (isset($PointsCandidats)) {?>
		
		<thead>
			<tr>
				<th>Voici votre classement</th>
			</tr>
		</thead>
		
		
		<?php 	
			foreach ($PointsCandidats as $key => $PointCandidat) {				
				echo '
						<tr>
							<td>'.$key.'</td><td>'.$PointCandidat.'</td>
				
						</tr>		
					' ;
			}
		}?>
		</table>
	</div>
</div>

<div>
<form class="form-inline" method="post" action="">

	<input type="hidden" name="envoiFormulaire" value="ok">
	<?php foreach ($themes as $key => $theme) {
		
	?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
				<?php echo "<h1>".$key."</h1>" ?>
				</th>
			</tr>
		</thead>
		<tr>
		<?php 
		foreach ($theme as $key => $proposition)
		{
			echo '<td>'.$proposition->proposition().'</td>';
		?>
		<td>
			Excellent
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="excellent" value="3"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '3') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Très Bien
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="tres_bien" value="2"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '2') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Bien
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="bien" value="1"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '1') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Neutre
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="neutre" value="0"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '0') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Passable
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="passable" value="-1"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '-1') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Mauvais
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="mauvais" value="-2"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '-2') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			A Rejeter
			<label class="radio">
			  <input type="radio" name="<?php echo $proposition->id();?>" id="a_rejeter" value="-3"
			  <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '-3') {echo 'checked';}}?>>
			</label>
		</td>
		
		<td>
			Important !
			<input type="checkbox" name="checkImportant<?php echo $proposition->id();?>" id="checkImmportant"
			<?php if (isset($reponses['checkImportant'.$proposition->id()])){if ($reponses['checkImportant'.$proposition->id()] == 'on') {echo 'checked';}}?>>
		</td>
			  		
		</tr>
		<?php }
		?>
	</table>
		<?php }?>
<button type="submit" class=" btn btn-success">Valider</button>
</form>
</div>