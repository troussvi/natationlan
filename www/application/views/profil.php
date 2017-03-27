<html>
<body>
<section>
 
    <div id="profil">    
		
        <?php

		  if($tab==!null){
		  			foreach($tab as $lignes)
					{				
						echo '<div class="row"><h2><center>Profil de "<i>'.$lignes['nom'].' '.$lignes['prenom'].'</i>"</center></h2></div><hr><br><br>';
        				echo '<div class="row">
			        			<div class="large-5 large-offset-5 columns">
			        				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher une nage">
			        			</div>
			        			<div class="large-2 columns">
			        				<a href="/natationlan/www/index.php/lannionnatation/" style="background-color: #008CBA" class="button">Afficher un graphe </a>
			        			</div>
			        		  </div> ';
					}
			}

	


					echo "<table id=\"myTable\" class=\"row column text-center\">\n

				  <tr>		  
				
					  <th data-field=\"nom\"> Nage </th>
					  <th data-field=\"nom\"> Compétition</th>
					  <th data-field=\"nom\"> Date </th>
					  <th data-field=\"nom\"> Temps </th>

				  </tr>";	

					foreach($tab2 as $lignes)
					{

						echo"\t<tr>\n";
						echo form_open('lannionnatation/profil', 'class="form"'); 
							echo"\t\t<td>";
							
							echo $lignes['nomEpreuve'];
							
							echo form_hidden('nomEpreuve', ''.$lignes['nomEpreuve'].'');

							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['nomcompet'];
							
							echo form_hidden('nomcompet', ''.$lignes['nomcompet'].'');

							
							echo"</td>\n";							
							
							echo"\t\t<td>";
							
							echo $lignes['datecompet'];
							
							echo form_hidden('datecompet', ''.$lignes['datecompet'].'');

							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['tempsperf'];
							
							echo form_hidden('tempsperf', ''.$lignes['tempsperf'].'');

							
							echo"</td>\n";
																					
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			
						echo '</table></div></div><br><br><br>';

		
					
		?>
		<script>
					function myFunction() {
			  
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");

			 
			  for (i = 0; i < tr.length; i++) {
			    td = tr[i].getElementsByTagName("td")[0];
			    if (td) {
			      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
			        tr[i].style.display = "";
			      } else {
			        tr[i].style.display = "none";
			      }
			    } 
			  }
			}
		</script>
    </div>
     
</section>
</body>
</html>