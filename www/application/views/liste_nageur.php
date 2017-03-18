<html>
<body>
<section>
 
    <div id="Liste">    
      <center><h2>Liste des nageurs </h2></center>
		
        <?php
		
		echo "<table class=\"row column text-center\">\n

          <tr>
          
		
              <th data-field=\"nom\">Nom</th>
              <th data-field=\"prenom\">Prénom</th>
			  <th data-field=\"datenaissance\">Date naissance</th>
			  


          </tr>";
		  
		 
		  
		  if($tab==!null){
			
					foreach($tab as $lignes)
					{
						echo"\t<tr>\n";
						echo form_open('lannionnatation/liste/', 'class="form"'); 

							echo"\t\t<td>";
							
							echo $lignes['nom'];
							
							echo form_hidden('nom', ''.$lignes['nom'].'');

							
							echo"</td>\n";
						
							echo"\t\t<td>";
							
							echo $lignes['prenom'];
							
							echo form_hidden('prenom', ''.$lignes['prenom'].'');

						
							echo"</td>\n";

							echo"\t\t<td>";

							echo $lignes['datenaissance'];

							echo form_hidden('datenaissance', ''.$lignes['datenaissance'].'');

							echo"</td>\n";
							
							
							echo form_close(); 
							echo validation_errors(); 

                        
                        
						echo"\t</tr>\n";
					}
			

		}
			
		
		
		
		
		
		
		
		
		?>
    </div>
     
</section>
</body>
</html>