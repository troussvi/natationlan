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
 
    <div id="Record">    
		
        <?php
if (!empty($_POST)) {
    if (isset($_POST['bouton2'])) {
		$tab[0]=null;
    } elseif (isset($_POST['bouton3'])) {
    	$tab[0]=$tab14[0];
    	$tab[1]=$tab15[0];
    	$tab[2]=$tab16[0];
    	$tab[3]=$tab17[0];
    	$tab[4]=$tab18[0];
    	$tab[5]=$tab19[0];
     	$tab[6]=$tab20[0];
    	$tab[7]=$tab21[0];
    	$tab[8]=$tab22[0];
    	$tab[9]=$tab23[0];
    	$tab[10]=$tab24[0];
    	$tab[11]=$tab25[0]; 
    	$tab[12]=$tab26[0];    
    } elseif (isset($_POST['bouton4'])) {
       $tab=null;
    } else {
    	$tab=[];
    	//VOIR COMMENT FAIRE AVEC LA BOUCLE C PA LOIN
    	//$cpt=0;
    	//$u=1;
    	//$i=0;
    	//while($cpt<13){
    	//	$tab[$cpt]=$tab.$u[$i];
    	//	$u++;
    	//	$cpt++;
    	//}
    	$tab[0]=$tab1[0];
    	$tab[1]=$tab2[0];
    	$tab[2]=$tab3[0];
    	$tab[3]=$tab4[0];
    	$tab[4]=$tab5[0];
    	$tab[5]=$tab6[0];
     	$tab[6]=$tab7[0];
    	$tab[7]=$tab8[0];
    	$tab[8]=$tab9[0];
    	$tab[9]=$tab10[0];
    	$tab[10]=$tab11[0];
    	$tab[11]=$tab12[0]; 
    	$tab[12]=$tab13[0];        	    

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
							
							echo timeConvert(tempsEnCentieme($lignes['tempsperf']));
							
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