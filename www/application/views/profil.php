<html>
<body>
<section>
 
    <div id="profil">    
		
        <?php

		  if($tab==!null){
		  			foreach($tab as $lignes)
					{				
						echo '<div class="row"><h2><center>Profil de "<i>'.$lignes['nom'].' '.$lignes['prenom'].'</i>"</center></h2></div><br><br>';
					}
			}

	


					echo "<table class=\"row column text-center\">\n

				  <tr>		  
				
					  <th data-field=\"nom\"> Date </th>
					  <th data-field=\"nom\"> Compétition</th>
					  <th data-field=\"nom\"> Nage </th>
					  <th data-field=\"nom\"> Temps </th>

				  </tr>";	

					foreach($tab2 as $lignes)
					{

						echo"\t<tr>\n";
						echo form_open('lannionnatation/profil', 'class="form"'); 
							echo"\t\t<td>";
							
							echo $lignes['datecompet'];
							
							echo form_hidden('datecompet', ''.$lignes['datecompet'].'');

							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['nomcompet'];
							
							echo form_hidden('nomcompet', ''.$lignes['nomcompet'].'');

							
							echo"</td>\n";							
							
							echo"\t\t<td>";
							
							echo $lignes['nomEpreuve'];
							
							echo form_hidden('nomEpreuve', ''.$lignes['nomEpreuve'].'');

							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['tempsperf'];
							
							echo form_hidden('tempsperf', ''.$lignes['tempsperf'].'');

							
							echo"</td>\n";
																					
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			
						echo '</table></div></div>';

		
					
		?>
    </div>
     
</section>
</body>
</html>