<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $content; ?></title>
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">


</head>
  <body>
    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
      <ul class="orbit-container">
        <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
        <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
        <li class="orbit-slide is-active">
          <img src="http://medias.legrandbornand-reservation.com/images/info_pages/multitailles/1920x1440_banniere-sejour-piscine-1413.jpg">
        </li>
        <li class="orbit-slide">
          <img src="http://medias.legrandbornand-reservation.com/images/info_pages/multitailles/1920x1440_banniere-sejour-piscine-1413.jpg">
        </li>
        <li class="orbit-slide">
          <img src="http://medias.legrandbornand-reservation.com/images/info_pages/multitailles/1920x1440_banniere-sejour-piscine-1413.jpg">
        </li>
        <li class="orbit-slide">
          <img src="http://medias.legrandbornand-reservation.com/images/info_pages/multitailles/1920x1440_banniere-sejour-piscine-1413.jpg">
        </li>
      </ul>
    </div>
    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
		
		
          <li class="menu-text" <?php if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/accueil"){echo 'style="background-color :#000033"';}
		echo '><a href="/natationlan/www/index.php/lannionnatation/accueil">Lannion natation</a></li>'; ?>
		
          <li <?php if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/liste"){echo 'style="background-color :#000033"';}
		echo '><a href="/natationlan/www/index.php/lannionnatation/liste">Liste des nageurs</a></li>'; ?>
     

	 <li><a href="#">Record du club</a></li>
		 <?php 			
		 
	
		 if($this->session->userdata('statut')==='ADMIN'){
					
		echo'<li><a href="/natationlan/www/index.php/lannionnatation/insertionxml">Saisir temps</a></li>';
		echo'<li><a href="/natationlan/www/index.php/lannionnatation/enattente">En attente</a></li>';
		echo'<li><a href="/natationlan/www/index.php/lannionnatation/membres">Membres</a></li>';

					
					
		 }
				
		?>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
		<?php
		
		
			if($this->session->userdata('login')!==null){
				
				
				$hello=strtolower($this->session->userdata("prenom"));
				$hello{0}=strtoupper($hello{0});
				
				echo'<li>Connecté en temps que '.$hello.' -	 </li>';	 
				
			
				echo'<li><a href="/natationlan/www/index.php/lannionnatation/monprofil"'; 	
				if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/monprofil"){echo 'style="background-color :#000033"';}else{ echo'style="background-color: #008CBA"';} echo 'class="button" >Profil</a></li>';
				echo'<li><a href="/natationlan/www/index.php/lannionnatation/deconnexion"';
				if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/deconnexion"){echo 'style="background-color :#000033"';}else{ echo'style="background-color: #008CBA"';} echo 'class="button" style="background-color: #008CBA">Déconnexion</a></li>';
				
	
				
			}
		
			else{
				echo'<li><a href="/natationlan/www/index.php/lannionnatation/inscription"';
				if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/inscription"){echo 'style="background-color :#000033"';}else{ echo'style="background-color: #008CBA"';} echo 'class="button" style="background-color: #008CBA">Inscription</a></li>';
				echo'<li><a href="/natationlan/www/index.php/lannionnatation/connexion"';
				if($_SERVER['PHP_SELF']=="/natationlan/www/index.php/lannionnatation/connexion"){echo 'style="background-color :#000033"';}else{ echo'style="background-color: #008CBA"';} echo 'class="button" style="background-color: #008CBA">Connexion</a></li>';
			}
			
			
			
	  ?>
		
        </ul>
      </div>
    </div>
    <!-- End Top Bar -->

    <br><br>

    <?php $this->load->view($content); ?>



    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
