<?php


	  if($this->session->userdata('statut')!=='ADMIN'){


echo '<h3 class="container"> Vous navez pas les permissions </h3>';
 header('Location: accueil');

}
else{




   if(isset($notif)){
        




        echo $notif;

        
        
    }


echo "<table class=\"bordered container\">\n

          <tr>
          
              <th data-field=\"nom\"></th>
              <th data-field=\"prenom\">IdPokemon</th>
			  <th data-field=\"email\">Nom</th>

          </tr>";
					echo'<FORM>';

					foreach($user as $lignes)
					{
						echo"\t<tr>\n";
						foreach($lignes as $colonne)
						{
							echo"\t\t<td>";
							echo $colonne;
							echo"</td>\n";
						}
                        
                        
						echo"\t</tr>\n";
					}
					echo'</FORM>';


}




            ?>