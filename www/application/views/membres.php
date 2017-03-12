<?php

	if($this->session->userdata('login')!==null){
		
	  if($this->session->userdata('statut')!=='ADMIN'){


		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		 header('Location: accueil');

		}
		
		
	
	
else{




	
	
	if(isset($notif)){
				
				echo '<blockquote class=\"row column text-center\">'.$notif.'</blockquote>';
				
				
	}

echo "<table class=\"row column text-center\">\n

          <tr>
          
		
              <th data-field=\"nom\">Nom</th>
              <th data-field=\"prenom\">Prénom</th>
			  <th data-field=\"email\">Email</th>
			  <th data-field=\"reinitialiser\">Réinitialiser MDP</th>
			  <th data-field=\"supprimer\">Supprimer</th>
			  


          </tr>";
		  
		 
		  
		  if($user==!null){

					foreach($user as $lignes)
					{
						echo"\t<tr>\n";
						echo form_open('lannionnatation/membres/', 'class="form"'); 

							echo"\t\t<td>";
							
							echo $lignes['nom'];
							
							echo form_hidden('nom', ''.$lignes['nom'].'');

							
							echo"</td>\n";
						
							echo"\t\t<td>";
							
							echo $lignes['prenom'];
							
							echo form_hidden('prenom', ''.$lignes['prenom'].'');

						
							echo"</td>\n";

							echo"\t\t<td>";

							echo $lignes['email'];

							echo form_hidden('email', ''.$lignes['email'].'');

							echo"</td>\n";
							
							
							echo"\t\t<td>";

							 echo form_submit('reinit', 'Réinitialiser', 'class="button" style="background-color: #008CBA"');

							
							echo"</td>\n";
							
							echo"\t\t<td>";
								
							echo form_submit('supprimer', 'Supprimer', 'class="button" style="background-color: #008CBA"'); 
							
							
							echo"</td>\n";
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			

		}
		}	

	}
	else{
		
		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		header('Location: accueil');
		
		
	}


  ?>