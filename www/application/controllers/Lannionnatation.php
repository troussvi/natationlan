<?php
class Lannionnatation extends CI_Controller {
    
public function __construct()
{
parent::__construct();
/* On chargera ici les modèles qu'on désire*/
$this->load->model('User_model');
 $this->load->model('Privileges_model');
/*On importe la librairie session*/
$this->load->library('session');



}

public function accueil(){
	
	$data['content']='accueil';
	$data['title']='Accueil';
	$this->load->vars($data);
	$this->load->view('template');
	   
	
	
	
}

public function deconnexion(){
	$this->session->sess_destroy();
    $this->session->set_userdata('login',NULL);
	$this->accueil();
	
	
}

public function inscription(){
	

    $this->load->library(array('form_validation'));
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[_utilisateurs.email]');
    $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[4]');
    $this->form_validation->set_rules('password2', 'Mot de passe', 'required|min_length[4]');


	 
	 
      if ( $this->form_validation->run() !== false) {
        // then validation passed. Get from db
        $this->load->model('Inscription_model');
		if(($this->input->post('password')==$this->input->post('password2'))){

			$res = $this
					 ->Inscription_model
					 ->verify_user(
						$this->input->post('email'),
						$this->input->post('password'),
						$this->input->post('name'),
						$this->input->post('firstname')
					 );
				if ( $res == false ) { 

						$data['notif']='Demande en cours de traitement,vous recevrez un mail lorsque votre compte sera validé';
						$data['content']='inscription';
						$this->load->vars($data);
						$this->load->view('template');
						return 0;
				}
		}
						else{
								
							$data['notif']='<blockquote class="container">Les deux mots de passe doivent être identiques</blockquote>';

								
						}
	  }
	
    
	
    $data['content']='inscription';
    $data['title']='inscription';
    $this->load->vars($data);
    $this->load->view('template');
    	   
	
	
	
}
public function enattente(){
	
		$res = $this
					 ->Privileges_model
					 ->Utilisateur();
	
	$date['user']=$res;
    $data['content']='enattente';
    $data['title']='enattente';
    $this->load->vars($data);
    $this->load->view('template');
    	   
	
	
	
	
	
	
}




public function connexion(){

	/*On utilise le module code igniter spécifique aux formulaires*/
    $this->load->library('form_validation');
	/*Le login est obligatoire*/
    $this->form_validation->set_rules('email', 'Identifiant', 'required');
	/* Champs requis et taille minimale du mdp*/
    $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[6]');

	/*Si pas d'erreur lors de la soumission du formulaire*/
    if ( $this->form_validation->run() !== false ) {

	/*On vérifie les param en les envoyant modèle User*/
	$this->load->model('User_model');
	$this->load->model('Privileges_model');
	$res = $this
                 ->User_model
                 ->verify_user(
                    $this->input->post('email'),
                    $this->input->post('password')
                 );
				 
	$info=$this
				->Privileges_model
				->Utilisateur(
					$this->input->post('email'),
					$this->input->post('password')			
				);
        
	/*Si le membre existe*/
        if ( $res == true ) { 
        
		/*On initialise des variables de session*/
		$this->session->set_userdata('statut',$res['statut']);
		  $this->session->set_userdata('login', $this->input->post('email'));
		/*On redirige vers l'accueil*/
          $data['content']='accueil';
          $idConn=$this->session->userdata('login');
          
                     $data['notif']='<blockquote class="container">Vous êtes connecté en tant que '.$idConn.' !</blockquote>';

            $this->load->vars($data);
            $this->load->view('template');
            return 0;
        }
    /*Si il n'est pas dans la base de données*/
       
		if($res == false){
				
			$data['notif']='<blockquote class="container">Identifiant inconnu</blockquote>';
		
				
		}
		
    }

		$data['content']='connexion';
			$data['title']='Connexion';
			$this->load->vars($data);
			$this->load->view('template');	
	   

  }
  
  
}
 ?>