<?php

	if($this->session->userdata('login')!==null){
		
	  if($this->session->userdata('statut')!=='ADMIN'){


		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		 header('Location: accueil');

		}
		
		
	
	
else{




	
		
		if(isset($notif)){
					
					echo '<blockquote class=\"row column text-center\">'.$notif.'</blockquote>';
					
					
		}
		
		
		echo '<u><h2><center>Profil de '.$nom.'</center></h2></u>';
		

			

	}
			

	}
	else{
		
		echo '<h3 class="container"> Vous n\'avez pas les permissions </h3>';
		
		header('Location: accueil');
		
		
	}


  ?>