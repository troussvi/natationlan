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
				
					  <th data-field=\"nom\">idperf</th>
					  
				  </tr>";	

					foreach($tab2 as $lignes)
					{

						echo"\t<tr>\n";
						echo form_open('lannionnatation/profil', 'class="form"'); 
							echo"\t\t<td>";
							
							echo $lignes['idperf'];
							
							echo form_hidden('idperf', ''.$lignes['idperf'].'');

							
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