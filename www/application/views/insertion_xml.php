<?php 
	if($this->session->userdata('login')!==null){
		
	  if($this->session->userdata('statut')!=='ADMIN'){


		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		 header('Location: accueil');

		}
		
		
else{
	
	<div class="row">
		<div class="small-6 large-centered columns"> 
			<fieldset class="fieldset">
				<center> <h2>Importation de résultat via fichier xml</h2> <center>
					</br> 	

					<form method="post" action="<?php echo base_url() ?> xml/importxml" enctype="multipart/form-data">
						<input type="file" name="userfile" ><br><br>
						
					</form>
					

					</br>
						<input type="submit" name="submit" value="Importer" class="btn btn-primary">
						<?php echo form_close(); ?>
						<?php echo validation_errors(); ?>
					<center>
					</fieldset>
		</div>

	</div>
}

?>
