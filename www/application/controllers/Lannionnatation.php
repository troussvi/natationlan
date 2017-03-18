<?php
class Lannionnatation extends CI_Controller {
    
public function __construct()
{
parent::__construct();
/* On chargera ici les mod�les qu'on d�sire*/
$this->load->model('User_model');
 $this->load->model('Privileges_model');
  $this->load->model('Liste_model');

/*On importe la librairie session*/
$this->load->library('session');



}

public function accueil(){
	
	$data['content']='accueil';
	$data['title']='Accueil';
	$this->load->vars($data);
	$this->load->view('template');
	   
	
	
	
}



public function monprofil(){
	
	
	$data['content']='monprofil';
	$data['title']='Mon Profil';
	$this->load->vars($data);
	$this->load->view('template');
	   
	
	
	
}

public function deconnexion(){
	$this->session->sess_destroy();
    $this->session->set_userdata('login',NULL);
	$this->session->set_userdata('statut',NULL);
	$this->session->set_userdata('nom',NULL);
	$this->session->set_userdata('prenom',NULL);

	$this->accueil();
	
	
}

public function inscription(){
	
    $this->load->library(array('form_validation'));
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[6]');
    $this->form_validation->set_rules('password2', 'Mot de passe', 'required|min_length[6]');


	 
	 
      if ( $this->form_validation->run() !== false) {

		$this->load->model('Inscription_model');
		//mdp renseign�s identiques
		if(($this->input->post('password')==$this->input->post('password2'))){

			$res = $this
					 ->Inscription_model
					 ->verify_user(
						$this->input->post('email'),
						$this->input->post('password'),
						$this->input->post('name'),
						$this->input->post('firstname')
					 );
				if ( $res ==! false ) { 

						$data['notif']='Demande en cours de traitement,vous recevrez un mail lorsque votre compte sera valid�';
						$data['content']='inscription';
						$this->load->vars($data);
						$this->load->view('template');
						return 0;
				}
				
				else{
					
					
					$data['notif']='<blockquote class="container">Cette adresse email est d�j� utlis�e</blockquote>';
					
				}
		}
		else{
								
			$data['notif']='<blockquote class="container">Les deux mots de passe doivent �tre identiques</blockquote>';

								
		}
	  }
	
    
	
    $data['content']='inscription';
    $data['title']='inscription';
    $this->load->vars($data);
    $this->load->view('template');
    	   
	
	
	
}

public function membres(){
	$this->load->library('form_validation');
	$this->load->model('Privileges_model');
	$this->load->model('Gestion_model');

	
		$res = $this
					 ->Privileges_model
					 ->Utilisateur(1);
	
	
	if($this->input->post('reinit')!==null){

			$res3 = $this
					 ->Gestion_model
					 ->reinit(
						$this->input->post('email')
					 );

			$data['notif']='<blockquote class="container">Le mot de passe de '.$this->input->post('nom').' '.$this->input->post('prenom').' a �t� r�initialis� (Lannion1) </blockquote>';

	
	}
	
	if($this->input->post('supprimer')!==null){
	
				
			$res3 = $this
					 ->Gestion_model
					 ->supprimer(
						$this->input->post('email'),
						$this->input->post('nom'),
						$this->input->post('prenom')
					 );
		
		
		$data['notif']='<blockquote class="container"> '.$this->input->post('nom').' '.$this->input->post('prenom').' a �t� supprim� de la base de donn�es </blockquote>';
		
	}
	
	$res = $this
					 ->Privileges_model
					 ->Utilisateur(1);
	
	$data['user']=$res;
    $data['content']='membres';
    $data['title']='membres';
    $this->load->vars($data);
    $this->load->view('template');	
	
	
	
	
	
	
	
}


public function liste(){
	
	$this->load->library('form_validation');
	
	
	$data['tab']=$this
					 ->Liste_model
					 ->Nageurs();
					 
					 
	$data['content']='liste_nageur';
	$data['title']='Liste des nageurs';
	$this->load->vars($data);
	$this->load->view('template');
	
	
	
	
}



public function insertionxml(){
	
	$this->load->library('form_validation');
	
	$data['content']='insertion_xml';
	$data['title']='Ins�rer un temps';
	$this->load->vars($data);
	$this->load->view('template');
	   
	
	
}

public function enattente(){
	
	$this->load->library('form_validation');
	$this->load->model('Gestion_model');

	
		$res = $this
					 ->Privileges_model
					 ->Utilisateur(0);
	

	
	
		
		if($this->input->post('accepter')!==null){
						 
			$res2 = $this
                 ->Gestion_model
                 ->gestion(
                    $this->input->post('email'),
					$this->input->post('nom'),
					$this->input->post('prenom'),
                    1
                 );
			/* A d�ployer sur le ftp, ne marche pas en local
			$this->email->from('lannionnatation@gmail.com', 'Lannion natation');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Votre compte sur lannion natation');
			$this->email->message('Votre compte a bien �t� valid� , vous pouvez maintenant vous connecter et acc�der � votre profil');	
			$this->email->send();
			*/	 
		
			$nom=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$notif="$nom $prenom a �t� accept�e ";
			$data['notif']=$notif;	 
	
			
		}
	
		if($this->input->post('refuser')!==null){
			
			$res3 = $this
					 ->Gestion_model
					 ->gestion(
						$this->input->post('email'),
						$this->input->post('nom'),
						$this->input->post('prenom'),
						0
					 );
			$this->load->library('email');

			/* A d�ployer sur le ftp, ne marche pas en local
			$this->email->from('lannionnatation@gmail.com', 'Lannion natation');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Votre compte sur lannion natation');
			$this->email->message('Votre compte a bien �t� valid� , vous pouvez maintenant vous connecter et acc�der � votre profil');	
			$this->email->send();
			*/
					 
					 
			$nom=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$notif="$nom $prenom a �t� refus�(e) ";
			$data['notif']=$notif;	 
		}
	
		

	$res = $this
				->Privileges_model
				->Utilisateur(0);
	
	
	
	$data['user']=$res;
    $data['content']='enattente';
    $data['title']='enattente';
    $this->load->vars($data);
    $this->load->view('template');
    	   
	
	
	
	
	
	
}




public function connexion(){

	/*On utilise le module code igniter sp�cifique aux formulaires*/
    $this->load->library('form_validation');
	/*Le login est obligatoire*/
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	/* Champs requis et taille minimale du mdp*/
    $this->form_validation->set_rules('password', 'Mot de passe', 'required|min_length[6]');

	/*Si pas d'erreur lors de la soumission du formulaire*/
    if ( $this->form_validation->run() !== false ) {

	/*On v�rifie les param en les envoyant mod�le User*/
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
		
		  $this->session->set_userdata('statut',$res->statut);
		  $this->session->set_userdata('nom',$res->nom);
		  $this->session->set_userdata('prenom',$res->prenom);
		  $this->session->set_userdata('login', $this->input->post('email'));
		/*On redirige vers l'accueil*/
          $data['content']='accueil';
          $idConn=$this->session->userdata('nom');
          $idConn2=$this->session->userdata('prenom');
		  
          
                     $data['notif']='<blockquote class="container">Vous �tes connect� en tant que '.$idConn.' '.$idConn2.'  !</blockquote>';

            $this->load->vars($data);
            $this->load->view('template');
            return 0;
        }
    /*Si il n'est pas dans la base de donn�es*/
       
		if($res == false){
				
			$data['notif']='<blockquote class="container">Couple identifiant/mot de passe non valid�</blockquote>';
		
				
		}
		
		
	
		
    }

		$data['content']='connexion';
			$data['title']='Connexion';
			$this->load->vars($data);
			$this->load->view('template');	
	   

  }
  
  
}
 ?>