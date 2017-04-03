<html>
<body>
<section>
 
    <div id="Graph">    
	<form action="affich_graph" class="form" method="post" accept-charset="utf-8">	
        <?php		        
        echo '<div class="row"><center><h2>Création de graphique</h2><center></div><br><hr><br>';
        if($res!=null){

				echo "<div class=\"row\">
					
						<div class=\"large-4 columns\">

						   
							<select name=\"type\" size=\"1\">"; 
        	foreach($res as $lignes)
					{
							echo "<option value=".$lignes['raceid']." >";

								echo $lignes['nomEpreuve'];

					}						
						echo "</select>

							";
		}
						echo "</div>

						<div class=\"large-4 columns\">

							
								<select name=\"bassin\" size=\"1\">
									<option value=\"25\" >25
									<option value=\"50\" >50
								</select>
							
							<input type=\"hidden\" name=\"username\" value=".$_GET['id']." />	

						</div>

						<div class=\"large-4 columns\">

								<input class=\"button expanded\" type=\"submit\" name=\"bouton\" value=\" Créer le graphique \" />

						</div>

					  </div>
					  <br><br>
					  <br><br>
					  <br><br>";
		  
		?>
		</form>

    </div>
     
</section>
</body>
</html>

					
						
						
							
							                             					
					}
