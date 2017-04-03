<script src="../../js/Chart.min.js"></script> 


<?php

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

function tpsConvert($tab){
                $entrois= explode(":",$tab);
                $tab=(($entrois[0]*60)+$entrois[1]).'.'.$entrois[2];
                return $tab; 
    }


            	foreach($res as $lignes)
					{
								$stp=tpsConvert(timeConvert($lignes['tempsperf']));
					}



	$tab['n1']=0;
	$tab['n2']=0;
	$tab['n3']=0;
	$tab['n4']=0;
	$tab['n5']=0;
	$tab['n6']=0;
	$tab['n7']=0;
	$tab['n8']=0;
	$tab['n9']=$stp;
	$tab['n10']=0;

		        echo '<div class="row"><center><h2>Graphique pour cette épreuve </h2><center></div><br><hr><br>';

				echo '<div class="row">
						<div class="large-2 columns">
							<div style="display:inline-block;width:20px;height:10px;background-color:#6ac7f0;"></div>
							<div style="margin-left:5px;display:inline-block;">Temps en seconde</div></div><br/>
				
						<center><div class="large-10 columns">
							<canvas id="line" width="600" height="400"></canvas>
						</div></center>';
?>
		<script>
	  var lineData = {
	    labels : ["Janvier","Février","Mars","Avril","Mai","Juin","Septembre","Octobre","Novembre","Décembre"],
	    datasets : [
	    {
	      label: "Temps",
	      fillColor : "#6ac7f0",
	      strokeColor : "#6ac7f0",
	      pointColor : "#6ac7f0",
	      pointStrokeColor : "#fff",
	      pointHighlightFill : "#fff",
	      pointHighlightStroke : "rgba(220,220,220,1)",
	      data : [<?php echo $tab['n1'] ?>,<?php echo $tab['n2'] ?>,<?php echo $tab['n3'] ?>,<?php echo $tab['n4'] ?>,<?php echo $tab['n5'] ?>,<?php echo $tab['n6'] ?>,<?php echo $tab['n7'] ?>,<?php echo $tab['n8'] ?>,<?php echo $tab['n9'] ?>,<?php echo $tab['n10'] ?>]
	    }]

	  }

	    // doughnut chart options
	    var lineOptions = {
	      responsive: true
	    }

	  // get line chart canvas
	  var line = document.getElementById('line').getContext('2d');

	  // draw line chart
	  new Chart(line).Line(lineData, lineOptions);

	</script>
