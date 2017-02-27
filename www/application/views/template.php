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
          <img src="http://placehold.it/2000x250">
        </li>
        <li class="orbit-slide">
          <img src="http://placehold.it/2000x250">
        </li>
        <li class="orbit-slide">
          <img src="http://placehold.it/2000x250">
        </li>
        <li class="orbit-slide">
          <img src="http://placehold.it/2000x250">
        </li>
      </ul>
    </div>
    <!-- Start Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">Lannion natation</li>
          <li><a href="#">Liste des nageurs</a></li>
          <li><a href="#">Record du club</a></li>
        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
		<?php
			if($this->session->userdata('login')!==null){
				
				echo'<li>Connecté en temps que '.$this->session->userdata("login").'</li>';	  
				echo'<li><a href="/index.php/lannionnatation/deconnexion" class="button" style="background-color: #008CBA">Déconnexion</a></li>';
			}
		
			else{
				echo'<li><a href="/index.php/lannionnatation/inscription" class="button" style="background-color: #008CBA">Inscription</a></li>';
				echo'<li><a href="/index.php/lannionnatation/connexion" class="button" style="background-color: #008CBA">Connexion</a></li>';
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
