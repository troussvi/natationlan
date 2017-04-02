<link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">

<script src="https://unpkg.com/flatpickr"></script>

<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="../../js/fr.js"></script>
<?php
echo '<div class="container">';
echo form_open('lannionnatation/inscription', 'class="form"'); 



/*On affiche la notif*/
		if(isset($notif)){
				echo'<div class="small-6 large-centered columns">';

				echo'<blockquote>'.$notif.'</blockquote>';
				
				echo'</div>';
			}
			
			
?> 	
			
			
			


  <div class="row">
	<div class="small-6 large-centered columns">
	  <fieldset class="fieldset">
			<center><h2> Inscription </h2></center>
			<br>
			 <center>
			 <?php echo form_label('Homme: ', 'sexe'); ?>
			  <?php echo form_radio('sexe', 'M', FALSE , 'class="form-control" id="sexe"'); ?>
			  <br>
			 <?php echo form_label('Femme: ', 'sexe'); ?>
			  <?php echo form_radio('sexe', 'F', FALSE , 'class="form-control" id="sexe"'); ?>
			</center>
			 <br><?php echo form_label('Nom: ', 'name'); ?>
			  <?php echo form_input('name', set_value('name'), 'class="form-control" id="name" autofocus'); ?>
			  
			  <?php echo form_label('Prénom: ', 'firstname'); ?>
			  <?php echo form_input('firstname', set_value('firstname'), 'class="form-control" id="surname" autofocus'); ?>
			  
			  <?php echo form_label('Email: ', 'email'); ?>
			  <?php echo form_input('email', set_value('email'), 'class="form-control" id="email" autofocus'); ?>
			  
			  <?php echo form_label('Mot de passe:', 'password'); ?>
			  <?php echo form_password('password', '', 'class="form-control" id="password"'); ?>

			  <?php echo form_label('Mot de passe:', 'password2'); ?>
			  <?php echo form_password('password2', '', 'class="form-control" id="password"'); ?>
			  
			  <?php echo form_label('Date de naissance:', 'date'); ?>
			  <?php echo form_password('date', set_value('date'), 'class="form-control input-group-field flatpickr" name="date" id="date" autofocus'); ?>

			<br><p class="pull-right">
			  <?php echo form_submit('send', 'Envoyer', 'class="button"'); ?>
			</p>

			  <?php echo form_close(); ?>
			  <?php echo validation_errors();?>
			  


	  </fieldset>
  </div>
</div>

	<script>
		flatpickr(".flatpickr", {
			minDate: "1907-01-01",
			maxDate: "2010-01-01",
		});
	</script>
