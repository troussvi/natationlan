<?php 
function tempsEnCentieme($time){
        $res = 0;
        $str = str_split($time);
        $trouve=False;
        foreach ($str as $value){
            if ($value == '.'){
                $trouve = True;
            }
        }
        if ($trouve == True){// si le nombre est à virgule
            if (substr($time,-5,1)=='.'){//4 chiffres après la virgule
                $cent=substr($time,-2,2);
                $sec=substr($time,-4,2);
            }
            if (substr($time,-4,1)=='.'){//3 chiffres après la virgule
                $cent=substr($time,-1);
                $cent=(int)$cent;
                $cent=$cent*10;
                $sec=substr($time,-3,2);
            }
            if (substr($time,-3,1)=='.'){//2 chiffres après la virgule
                $cent=0;
                $sec=substr($time,-2,2);
            }
            if (substr($time,-2,1)=='.'){//1 chiffre après la virgule
                $cent=0;
                $sec=substr($time,-1,1);
                $sec=$sec*10;
            }
            $res = floor($time)*60*100+$sec*100+$cent;
        }else{
            $res = $time*60*100;
        }
        return $res;
    }



function timeConvert($time){//convertie le temps en mm:ss:cc rajouter les heures avec un temps de base en centième
        $res = $time;
        $minTotal = $res/100/60;
        $minRes = floor($minTotal);
        $res = $res - $minRes*60*100;
        $secTotal = $res/100;
        $secRes = floor($secTotal);
        $centRes = $res - $secRes*100;
        $sec_length = strlen((string)$secRes);
        if($sec_length <=1) {
            $secRes = '0'.$secRes;
        }
        $cent_length = strlen((string)$centRes);
        if($cent_length <=1) {
            $centRes = '0'.$centRes;
        }   
        return $minRes.':'.$secRes.':'.$centRes;
    }

?>


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
			        				<a href="/natationlan/www/index.php/lannionnatation/graph" style="background-color: #008CBA" class="button">Afficher un graphe </a>
			        			</div>
			        		  </div> ';
					}
			}

	


					echo "<br><table id=\"myTable\" class=\"row column text-center\">\n

				  <tr>		  
				
					  <th data-field=\"nom\"> Nage </th>
					  <th data-field=\"nom\"> Compétition</th>
					  <th data-field=\"nom\"> Date </th>
					  <th data-field=\"nom\"> Temps </th>

				  </tr>";	

					foreach($tab2 as $lignes)
					{

						echo"\t<tr>\n";

							echo"\t\t<td>";
							
							echo $lignes['nomEpreuve'];

							
							echo"</td>\n";

							echo"\t\t<td>";
							
							echo $lignes['nomcompet'];

							echo"</td>\n";							
							
							echo"\t\t<td>";
							
							echo $lignes['datecompet'];

							echo"</td>\n";

							echo"\t\t<td>";
							
							echo timeConvert(tempsEnCentieme($lignes['tempsperf']));
							
							echo"</td>\n";
																					           
                        
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