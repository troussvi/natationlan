<!DOCTYPE html>
<html lang="fr">
<head>
 
	<meta charset="UTF-8" />
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">



<?php 

	if($this->session->userdata('login')!==null){
		
	  if($this->session->userdata('statut')!=='ADMIN'){


		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		 header('Location: accueil');

		}
		
		
	else{
		
			echo form_open_multipart('lannionnatation/insertionxml', 'class="form"'); ?>



		<div class="row">
		 <div class="large-6 columns">
			<fieldset class="fieldset">
				<center> <h2>Fichier XML</h2> </br> <center>
					</br>
					<?php echo form_label('Votre fichier XML: ', 'fichXML'); ?>
						
					<input type="file" name="mon_fichier" id="mon_fichier" /><br /><br><br>
					</br>
					
					<?php echo form_submit('sendxml', 'Valider', 'class="button"'); ?>
					
					<!-- <input type="submit" name="submit" value="Envoyer" /> -->
					<?php echo form_close(); ?>
					<?php echo validation_errors(); ?>
					<center>
						</fieldset>
			</div>

		
		
		
		<?php
			echo '<div class="container">';
				echo form_open('lannionnatation/importer_resultat', 'class="form"'); ?>
	
		
			
				<div class="large-6 columns"> 
					<fieldset class="fieldset">
					<center> <h2>Ajout de record pour un nageur</h2> <center>
					</br> 	

						<?php echo form_label('Nom du nageur: ', 'nom_nageur'); ?>
						<?php echo form_input('nom_nageur', set_value('nom_nageur'), 'class="form-control" id="nom_nageur" autofocus'); ?>
						</br>
						<?php echo form_label('Adresse email: ', 'email'); ?>
						<?php echo form_input('email', set_value('email'), 'class="form-control" id="email" autofocus'); ?>	
						</br>
						<?php echo form_label('Compétition: ', 'nom_competition'); ?>
						<?php echo form_input('nom_competition', set_value('nom_competition'), 'class="form-control" id="nom_competition" autofocus'); ?>
						</br>
						<?php echo form_label('Epreuve: ', 'nom_epreuve'); ?>
						<?php echo form_input('nom_epreuve', set_value('nom_epreuve'), 'class="form-control" id="nom_epreuve" autofocus'); ?>
						</br>
						<?php echo form_label('Temps: ', 'temps'); ?>
						<?php echo form_input('temps', set_value('temps'), 'class="form-control" id="temps" autofocus'); ?>
						</br>
					
					</br>
						<?php echo form_submit('send', 'Valider', 'class="button"'); ?>
						<?php echo form_close(); ?>
						<?php echo validation_errors(); ?>
					<center>
					</fieldset>
				</div>

			</div>	
		</div>
		</html>
		
	<?php	
	}	
		
	}	
else{
	

	

}
?>
