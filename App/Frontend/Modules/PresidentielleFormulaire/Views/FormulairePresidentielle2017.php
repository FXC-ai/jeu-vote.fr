<?php if (isset($PointsCandidats)) {?>
<div class="row">
	<div class = "col-md-12">
		
		<h4>Voici votre classement :</h4>
	
		<table class="table">	
	
		
		<?php 	
			foreach ($PointsCandidats as $key => $PointCandidat) {				
				echo '
						<tr>
							<td>'.$key.'</td><td>'.$PointCandidat.'</td>
				
						</tr>		
					' ;
			}
		?>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
		<thead>
			<tr>
				<th>Barème</th>
			</tr>
		</thead>
		
		<tr class = "danger">
			<td>Moins de -21</td><td>Les idées de ce(tte) candidat(e) vous ont semblés à rejeter voire dangeureuses.</td>
		</tr>
		
		<tr class = "danger">
			<td>Entre -21 et -14</td><td>Les idées de ce(tte) candidat(e) vous ont semblées à rejeter.</td>
		</tr>
		
		<tr class = "warning">
			<td>Entre -14 et -7</td><td>Les idées de ce(tte) candidat(e) vous ont semblés mauvaises.</td>
		</tr>	
		
		<tr class = "warning">
			<td>Entre -7 et 0</td><td>Les idées de ce(tte) candidat(e) vous ont semblés passables.</td>
		</tr>
		
		<tr class = "info">
			<td>Entre 0 et 7</td><td>Les idées de ce(tte) candidat(e) vous ont semblés biens.</td>
		</tr>
		<tr class = "info">
			<td>Entre 7 et 14</td><td>Les idées de ce(tte) candidat(e) vous ont semblés trés biens.</td>
		</tr>
		
		<tr class = "success">
			<td>Entre 14 et 21</td><td>Les idées de ce(tte) candidat(e) vous ont semblés excellentes.</td>
		</tr>
		
		<tr class = "success">
			<td>Plus de 21</td><td>Les idées de ce candidats vous ont semblés excellentes et importantes.</td>
		</tr>

		
		</table>
		
		
		
	</div>
	<div class="col-md-12 text-center">
		<h3>Si vous voulez le fin de mot de l'histoire, c'est par ici !</h3>
		
		
		<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
	</div>
	
</div>
<?php }?>


<?php if (isset($msgErreur)) {?>
	<div class="row">
		<div class="alert alert-danger text-center" role="alert">
  			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  			<span class="sr-only">Error:</span>
  			<?php echo $msgErreur;?>
		</div>	
	</div>
<?php }?>

<div>
	<h3>Que pensez-vous de ces propositions ?</h3>
	<form class="form-inline" method="post" action="">
		<input type="hidden" name="envoiFormulaire" value="ok">
		
		<?php
		
			//$_POST['ListePropositionsUniq'] = $ListePropositionsUniq;
			foreach ($ListeThemes as $theme) {
				
				
		?>
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>
						<h1><?php echo "<h1>".$theme."</h1>" ?></h1>
					</th>
				</tr>
			</thead>
			
			<tr>
		<?php 
		
			foreach ($ListePropositionsUniq[$theme] as $proposition) { ?>
				

			<td>
			<?php 
					
				echo $proposition->detail().' - '.$proposition->proposition().' ';
		
				if (isset($erreursId) && in_array($proposition->id(), $erreursId)) { ?>
											
					<span class="glyphicon glyphicon-exclamation-sign alert-danger" aria-hidden="true"></span>
					
				
			<?php }?>
			<?php	
				if(isset($revelation)){echo '<h3>'.$proposition->idCandidat().'</h3>';}
			?>		
			</td>
			<td>
				Excellent
				<label class="radio">
				  <input type="radio" name="<?php echo $proposition->id()?>" id="excellent" value="3"
			 	 <?php if (isset($reponses[$proposition->id()])) {if ($reponses[$proposition->id()] == '3') {echo 'checked';}}?>>
				</label>
			</td>
		
			<td>
				Trés Bien
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
		<?php
				}}
		?>
		
	</table>
		<button type="submit" class=" btn btn-success">Valider</button>
	</form>
</div>