<html>
<body>
<section>
 
    <div id="Liste">    
		
        <?php

        echo '
		<div class="row"><center><h2>Liste des nageurs</h2><center></div><br><br>';
        echo '<div class="expanded row">
        		<div class="large-5 columns">
        		<input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Rechercher une nageuse">
        		</div>   		
        		<div class="large-5 columns large-offset-2 columns">
        		<input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Rechercher un nageur">
        		</div>	
        	  </div><br><br>';
		echo "<div class=\"expanded row\"><div class=\"large-5 columns\"><table id=\"myTable1\" class=\"row column text-center\">\n

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

					echo "<table id=\"myTable2\" class=\"row column text-center\">\n

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
			
						echo '</table></div></div><br><br><br><br><br>';

		}



			
		
		
		
	
		?>
			<script>
			function myFunction1() {
			  // Declare variables 
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput1");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable1");
			  tr = table.getElementsByTagName("tr");

			  // Loop through all table rows, and hide those who don't match the search query
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

			function myFunction2() {
			  // Declare variables 
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput2");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable2");
			  tr = table.getElementsByTagName("tr");

			  // Loop through all table rows, and hide those who don't match the search query
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