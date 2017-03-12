
<?php
		echo '<div class="container">';
		echo form_open('lannionnatation/connexion', 'class="form"'); ?>
	
		
			<div class="row">
				<div class="small-6 large-centered columns"> 
					<fieldset class="fieldset">
					<center> <h2>Connexion</h2> <center>
					</br> 	

						<?php echo form_label('Adresse email: ', 'email'); ?>
						<?php echo form_input('email', set_value('email'), 'class="form-control" id="email" autofocus'); ?>	
						<?php echo form_label('Mot de passe:', 'password'); ?>
						<?php echo form_password('password', '', 'class="form-control" id="password"'); ?>
					
					<a href="mdp_oublie.php" class="float-right">Mot de passe oublie</a>
					</br>
						<?php echo form_submit('send', 'Envoyer', 'class="button"'); ?>
						<?php echo form_close(); ?>
						<?php echo validation_errors(); ?>
					<center>
					</fieldset>
				</div>

			</div>


	<?php
			if(isset($notif)){
				echo'<div class="small-6 large-centered columns">';

				echo'<blockquote>'.$notif.'</blockquote>';
				
				echo'</div>';
			}

	?>
	
		




