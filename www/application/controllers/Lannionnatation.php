<?php
class Lannionnatation extends CI_Controller {
    
public function __construct()
{
parent::__construct();
/* On chargera ici les modèles qu'on désire*/
$this->load->model('User_model');
 $this->load->model('Privileges_model');
  $this->load->model('Liste_model');
  $this->load->model('Nageur_model');
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
    $this->form_validation->set_rules('date', 'Date de naissance', 'required');
    $this->form_validation->set_rules('sexe', 'Sexe', 'required');

	 
	 
      if ( $this->form_validation->run() !== false) {

		$this->load->model('Inscription_model');
		//mdp renseignés identiques
		if(($this->input->post('password')==$this->input->post('password2'))){

			$res = $this
					 ->Inscription_model
					 ->verify_user(
						$this->input->post('email'),
						$this->input->post('password'),
						$this->input->post('name'),
						$this->input->post('firstname'),
						$this->input->post('date'),
						$this->input->post('sexe')
					 );
				if ( $res ==! false ) { 

						$data['notif']='Demande en cours de traitement,vous recevrez un mail lorsque votre compte sera validé';
						$data['content']='inscription';
						$this->load->vars($data);
						$this->load->view('template');
						return 0;
				}
				
				else{
					
					
					$data['notif']='<blockquote class="container">Cette adresse email est déjà utlisée</blockquote>';
					
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

			$data['notif']='<blockquote class="container">Le mot de passe de '.$this->input->post('nom').' '.$this->input->post('prenom').' a été réinitialisé (Lannion1) </blockquote>';

	
	}
	
	if($this->input->post('supprimer')!==null){
	
				
			$res3 = $this
					 ->Gestion_model
					 ->supprimer(
						$this->input->post('email'),
						$this->input->post('nom'),
						$this->input->post('prenom')
					 );
		
		
		$data['notif']='<blockquote class="container"> '.$this->input->post('nom').' '.$this->input->post('prenom').' a été supprimé de la base de données </blockquote>';
		
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
					 ->NageursFeminin();
					 
					 
	$data['tab2']=$this
					 ->Liste_model
					 ->NageursMasculin();
	$data['content']='liste_nageur';
	$data['title']='Liste des nageurs';
	$this->load->vars($data);
	$this->load->view('template');
	
	
	
	
}


public function profil(){
	
	$this->load->library('form_validation');
	
	
		$nom=strtolower($this->input->post("nom"));
		$nom{0}=strtoupper($nom{0});
	
	$data['nom']=''.$this->input->post('prenom').' '.$nom.'';
	
	$data['content']='monprofil';
	$data['title']='Profil';
	$this->load->vars($data);
	$this->load->view('template');
	
	
}

public function nageur(){
				 
	$data['tab']=$this
					 ->Nageur_model
					 ->get_nageur($_GET['id']);
	$data['tab2']=$this
					 ->Nageur_model
					 ->get_perf($_GET['id']);			 					 					 
	$data['content']='Profil';
	$data['title']='Nageur n°'.$_GET['id'].'';
	$this->load->vars($data);
	$this->load->view('template');
	
	
}

public function graph(){

	$data['content']='graph';
	$data['title']='Graph';
	$this->load->vars($data);
	$this->load->view('template');
}

public function records(){

	$data['content']='Records';
	$data['title']='Records';
	$this->load->vars($data);
	$this->load->view('template');
}

public function record(){

	$this->load->model('Record_model');
//TAB FEMME
	$data['tab1']=$this
				 ->Record_model
				 ->get_max_record(25,'F',9);
	$data['tab2']=$this
				 ->Record_model
				 ->get_max_record(25,'F',12);	
	$data['tab3']=$this
				 ->Record_model
				 ->get_max_record(25,'F',22);
	$data['tab4']=$this
				 ->Record_model
				 ->get_max_record(25,'F',2);
	$data['tab5']=$this
				 ->Record_model
				 ->get_max_record(25,'F',32);
	$data['tab6']=$this
				 ->Record_model
				 ->get_max_record(25,'F',43);
	$data['tab7']=$this
				 ->Record_model
				 ->get_max_record(25,'F',44);
	$data['tab8']=$this
				 ->Record_model
				 ->get_max_record(25,'F',13);
	$data['tab9']=$this
				 ->Record_model
				 ->get_max_record(25,'F',23);
	$data['tab10']=$this
				 ->Record_model
				 ->get_max_record(25,'F',4);
	$data['tab11']=$this
				 ->Record_model
				 ->get_max_record(25,'F',33);
	$data['tab12']=$this
				 ->Record_model
				 ->get_max_record(25,'F',41);
	$data['tab13']=$this
				 ->Record_model
				 ->get_max_record(25,'F',46);


//TAB HOMME
	$data['tab14']=$this
				 ->Record_model
				 ->get_max_record(25,'M',59);
	$data['tab15']=$this
				 ->Record_model
				 ->get_max_record(25,'M',62);	
	$data['tab16']=$this
				 ->Record_model
				 ->get_max_record(25,'M',72);
	$data['tab17']=$this
				 ->Record_model
				 ->get_max_record(25,'M',52);
	$data['tab18']=$this
				 ->Record_model
				 ->get_max_record(25,'M',82);
	$data['tab19']=$this
				 ->Record_model
				 ->get_max_record(25,'M',93);
	$data['tab20']=$this
				 ->Record_model
				 ->get_max_record(25,'M',94);
	$data['tab21']=$this
				 ->Record_model
				 ->get_max_record(25,'M',63);
	$data['tab22']=$this
				 ->Record_model
				 ->get_max_record(25,'M',73);
	$data['tab23']=$this
				 ->Record_model
				 ->get_max_record(25,'M',54);
	$data['tab24']=$this
				 ->Record_model
				 ->get_max_record(25,'M',83);
	$data['tab25']=$this
				 ->Record_model
				 ->get_max_record(25,'M',91);
	$data['tab26']=$this
				 ->Record_model
				 ->get_max_record(25,'M',96);
				 				 
	$data['content']='Record';
	$data['title']='Record';
	$this->load->vars($data);
	$this->load->view('template');
}

public function insertionxml(){
	
	$this->load->library('form_validation');
	
	$data['content']='insertion_xml';
	$data['title']='Insérer un temps';
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
			/* A déployer sur le ftp, ne marche pas en local
			$this->email->from('lannionnatation@gmail.com', 'Lannion natation');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Votre compte sur lannion natation');
			$this->email->message('Votre compte a bien été validé , vous pouvez maintenant vous connecter et accéder à votre profil');	
			$this->email->send();
			*/	 
		
			$nom=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$notif="$nom $prenom a été acceptée ";
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

			/* A déployer sur le ftp, ne marche pas en local
			$this->email->from('lannionnatation@gmail.com', 'Lannion natation');
			$this->email->to($this->input->post('email'));
			$this->email->subject('Votre compte sur lannion natation');
			$this->email->message('Votre compte a bien été validé , vous pouvez maintenant vous connecter et accéder à votre profil');	
			$this->email->send();
			*/
					 
					 
			$nom=$this->input->post('nom');
			$prenom=$this->input->post('prenom');
			$notif="$nom $prenom a été refusé(e) ";
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

	/*On utilise le module code igniter spécifique aux formulaires*/
    $this->load->library('form_validation');
	/*Le login est obligatoire*/
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
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
		
		  $this->session->set_userdata('statut',$res->statut);
		  $this->session->set_userdata('nom',$res->nom);
		  $this->session->set_userdata('prenom',$res->prenom);
		  $this->session->set_userdata('login', $this->input->post('email'));
		/*On redirige vers l'accueil*/
          $data['content']='accueil';
          $idConn=$this->session->userdata('nom');
          $idConn2=$this->session->userdata('prenom');
		  
          
                     $data['notif']='<blockquote class="container">Vous êtes connecté en tant que '.$idConn.' '.$idConn2.'  !</blockquote>';

            $this->load->vars($data);
            $this->load->view('template');
            return 0;
        }
    /*Si il n'est pas dans la base de données*/
       
		if($res == false){
				
			$data['notif']='<blockquote class="container">Couple identifiant/mot de passe non validé</blockquote>';
		
				
		}
		
		
	
		
    }

		$data['content']='connexion';
			$data['title']='Connexion';
			$this->load->vars($data);
			$this->load->view('template');	
	   

  }
  
  
}
 ?>