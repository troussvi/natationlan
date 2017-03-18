<html>
<body>
<section>
 
    <div id="Liste">    
		
        <?php

        echo '<div class="row"><center><h2>Liste des nageurs</h2><center></div><br><br>';
		echo "<div class=\"expanded row\"><div class=\"large-5 large-offset-1 columns\"><table class=\"row column text-center\">\n

          <tr>
          
		
              <th data-field=\"nom\">Nom</th>
              <th data-field=\"prenom\">Prénom</th>
			  <th data-field=\"datenaissance\">Profil</th>
			  


          </tr>";
		  
		 
		  
		  if($tab==!null){
				echo '<u><h2><center>Dames</center></h2></u>';

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
								
			
							echo '<a href="/natationlan/www/index.php/lannionnatation/nageur?id='.$lignes['idnageur'].'"><i class="large material-icons">zoom_in</i></a>';							
							
							echo"</td>\n";
							
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
						
					}
						echo '</table></div>';
			
			
		}
		
			  if($tab2==!null){
			  		echo '<div class="large-5 large-offset-1 columns"><u><h2><center>Messieurs</center></h2></u>';

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
							echo '<a href="/natationlan/www/index.php/lannionnatation/nageur?id='.$lignes['idnageur'].'"><i class="large material-icons">zoom_in</i></a>';
							
							
							echo"</td>\n";
							
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			
						echo '</table></div></div>';

		}
			
		
		
		
		
		
		
		
		
		?>
    </div>
     
</section>
</body>
</html>