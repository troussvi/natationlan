<html>
<body>
<section>
 
    <div id="Record">    
		
        <?php
if (!empty($_POST)) {
    if (isset($_POST['bouton2'])) {
        $tab=$tab2;
    } elseif (isset($_POST['bouton3'])) {
        $tab=$tab3;
    } elseif (isset($_POST['bouton4'])) {
       $tab=$tab4;
    } else {
        $tab=$tab1;
    }
}
		echo "<div class=\"row\"><div class=\"large-12 columns\"><table id=\"myTable1\" class=\"row column text-center\">\n

          <tr>
          
		
              <th data-field=\"nom\">Epreuve</th>
              <th data-field=\"prenom\">Temps</th>
			  <th data-field=\"datenaissance\">Nom</th>
			  <th data-field=\"datenaissance\">Date</th>


          </tr>";

		  if($tab==!null){
				echo '<u><h2><center>Dames</center></h2><br><br></u>';

					foreach($tab as $lignes)
					{
						
						echo"\t<tr>\n";


							echo"\t\t<td>";
							
							echo $lignes['nomEpreuve'];
							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['tempsperf'];
							
							echo"</td>\n";							
						
							echo"\t\t<td>";
							
							echo $lignes['nom'].' '.$lignes['prenom'];

						
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['datecompet'];

						
							echo"</td>\n";
                        
                        
						echo"\t</tr>\n";
						
					}
						echo '</table></div>';
			
			
		}
		  
		?>

    </div>
     
</section>
</body>
</html>