<html>
<body>
<section>
 
    <div id="Liste">    
		
        <?php
		
		echo "<table class=\"row column text-center\">\n

          <tr>
          
		
              <th data-field=\"nom\">Nom</th>
              <th data-field=\"prenom\">Prénom</th>
			  <th data-field=\"datenaissance\">Profil</th>
			  


          </tr>";
		  
		 
		  
		  if($tab==!null){
				echo '<u><h2><center>Seniors</center></h2></u>';

					foreach($tab as $lignes)
					{
						
						echo"\t<tr>\n";
						echo form_open('lannionnatation/profil', 'class="form"'); 

							echo"\t\t<td>";
							
							echo $lignes['nom'];
							
							echo form_hidden('nom', ''.$lignes['nom'].'');

							
							echo"</td>\n";
						
							echo"\t\t<td>";
							
							echo $lignes['prenom'];
							
							echo form_hidden('prenom', ''.$lignes['prenom'].'');

						
							echo"</td>\n";

							echo"\t\t<td>";
								
							//descriptif du bouton	
							$data = array(
								'name' => 'profil',
								'id' => 'button',
								'value' => 'mdr',
								'type' => 'submit',
								'content' => '<i class="large material-icons">zoom_in</i>'

							);
		
							echo form_button($data);			
							
							
							echo"</td>\n";
							
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
						
					}
						echo '</table>';
			
			
		}
		
			  if($tab2==!null){
			  		echo '<u><h2><center>Juniors</center></h2></u>';

					echo "<table class=\"row column text-center\">\n

				  <tr>
				  
				
					  <th data-field=\"nom\">Nom</th>
					  <th data-field=\"prenom\">Prénom</th>
					  <th data-field=\"datenaissance\">Profil</th>
					  


				  </tr>";	

					foreach($tab2 as $lignes)
					{

						echo"\t<tr>\n";
						echo form_open('lannionnatation/profil', 'class="form"'); 
							echo"\t\t<td>";
							
							echo $lignes['nom'];
							
							echo form_hidden('nom', ''.$lignes['nom'].'');

							
							echo"</td>\n";
						
							echo"\t\t<td>";
							
							echo $lignes['prenom'];
							
							echo form_hidden('prenom', ''.$lignes['prenom'].'');

						
							echo"</td>\n";

							echo"\t\t<td>";
								
							//descriptif du bouton	
							$data = array(
								'name' => 'profil',
								'id' => 'button',
								'value' => 'mdr',
								'type' => 'submit',
								'content' => '<i class="large material-icons">zoom_in</i>'

							);
		
							echo form_button($data);			
							
							
							echo"</td>\n";
							
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			
						echo '</table>';

		}
			
		
		
		
		
		
		
		
		
		?>
    </div>
     
</section>
</body>
</html>