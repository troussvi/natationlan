<?php
	echo '<div class="container">';
		echo form_open('lannionnatation/importer_resultat', 'class="form"'); ?>
	
		
			<div class="row">
				<div class="small-6 large-centered columns"> 
					<fieldset class="fieldset">
					<center> <h2>Ajout de record pour un nageur</h2> <center>
					</br> 	

						<?php echo form_label('Nom du nageur: ', 'nom_nageur'); ?>
						<?php echo form_input('nom_nageur', set_value('nom_nageur'), 'class="form-control" id="nom_nageur" autofocus'); ?>
						</br>
						<?php echo form_label('Adresse email: ', 'email'); ?>
						<?php echo form_input('email', set_value('email'), 'class="form-control" id="email" autofocus'); ?>	
						</br>
						<?php echo form_label('Comp�tition: ', 'nom_competition'); ?>
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
	
	
?>