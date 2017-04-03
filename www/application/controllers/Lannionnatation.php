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
	$this->load->model('Graph_model');

	$data['res']=$this
					 ->Graph_model
					 ->get_nom_epreuve($_GET['id']);	

	$data['content']='graph';
	$data['title']='Graph';
	$this->load->vars($data);
	$this->load->view('template');
}

public function affich_graph(){
	$this->load->model('Graph_model');

	$data['res']=$this
					 ->Graph_model
					 ->requete_graph($_POST['type'],$_POST['username'],$_POST['bassin']);	

	$data['content']='affich_graph';
	$data['title']='Votre Graphique';
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

private function peuplement($name){	
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

	try
	{
		$connection=new PDO('pgsql:host=postgresql-natationlannion.alwaysdata.net;port=5432;dbname=natationlannion_nat','natationlannion','Lannion1');
			$doc = new DomDocument;
			$doc->load($name);// recupérer le nom du fichier ici
			$noeudSwimmer = $doc->getElementsByTagName( "SWIMMER" );//where clubid=1160
			
			foreach( $noeudSwimmer as $noeudSwimmer )
			{
				if ($valueID = $noeudSwimmer->getAttribute('clubid')==1160){
					$firstname = $noeudSwimmer->getAttribute('firstname');
					$lastname = $noeudSwimmer->getAttribute('lastname');
					$gender = $noeudSwimmer->getAttribute('gender');
					$date = $noeudSwimmer->getAttribute('birthdate');
					$idnageur = $noeudSwimmer->getAttribute('id');
					$nageurs = $connection->prepare('SELECT * FROM lannionnatation._nageurs where nom = ? and prenom = ?');
					$nageurs->bindParam(1, $lastname);
					$nageurs->bindParam(2, $firstname);
					$nageurs->execute();
					$req=$nageurs->fetchAll();
					$present = False;//sert à éviter les doublons dans la bdd
					foreach ($req as $row){
						$present = True;
					}
					if ($present == True){//si True alors on ajoute pas dans la bdd strtoupper
						
					}else{//sinon on ajoute le nuplet
						$tableauSwimmer=array(':lastname'=>strtoupper($lastname),
								':firstname'=>strtoupper($firstname),
								':date'=>$date,
								':login'=>NULL,
								':sexe'=>$gender,
								':idnageur'=>$idnageur);
						$sth ="INSERT INTO lannionnatation._nageurs (nom, prenom, datenaissance,login,idnageur,sexe) VALUES(:lastname, :firstname, :date, :login ,:idnageur,:sexe);";
						$req= $connection->prepare($sth);
						$res=$req->execute($tableauSwimmer);
					}
				}
			}

		
		//infos sur la compétition
		$noeudMeet = $doc->getElementsByTagName( "MEET" );
		foreach( $noeudMeet as $noeudMeet )
		{
			$nomCompet = $noeudMeet->getAttribute('name');//nomcompet
			$dateCompet = $noeudMeet->getAttribute('startdate');//datecompet
		}
		
		
		$noeudPool = $doc->getElementsByTagName( "POOL" );
		foreach( $noeudPool as $noeudPool )
		{
			$poolSize = $noeudPool->getAttribute('size');//taillebassin
		}
		
		//traitement des résultats
		$noeudResult = $doc->getElementsByTagName( "RESULT" );
		foreach( $noeudResult as $noeudResult )
		{
			$idPerf = $noeudResult->getAttribute('id');//idperf
			$raceid = $noeudResult->getAttribute('raceid');//raceid
			$enfant=$noeudResult->firstChild;
			$ifSolo = false; //Sert a séparer le traitement d'un resultat solo de relay
			while ($enfant != null){
				if ($enfant->nodeType == XML_ELEMENT_NODE && $enfant->nodeName == 'SOLO'){
					$swimID = $enfant->getAttribute('swimmerid');
					$ifSolo=true;
				}
				$enfant = $enfant->nextSibling;
			}
			if ($ifSolo == true){ //Si la course est une course de type SOLO
				$enfant=$noeudResult->firstChild;
				while ($enfant != null){
					if ($enfant->nodeType == XML_ELEMENT_NODE && $enfant->nodeName == 'SOLO'){
						$swimID = $enfant->getAttribute('swimmerid');						
					}
					if ($enfant->nodeType == XML_ELEMENT_NODE && $enfant->nodeName == 'SPLITS'){
						
						$nodeSplit = $enfant->getElementsByTagName("SPLIT");
						foreach( $nodeSplit as $nodeSplit )
						{
							$swimtime = $nodeSplit->getAttribute('swimtime');
						}
						$swimtime = tempsEnCentieme($swimtime);
						//echo ' ID nageur : '.$swimID.' Temps : '.timeConvert($swimtime).'</br>';
						$tabInfos=array(':nomcompet'=>$nomCompet,
								':datecompet'=>$dateCompet,
								':taillebassin'=>$poolSize,
								':tempsperf'=>$swimtime,
								':raceid'=>$raceid,
								':idnageur'=>$swimID);
							$sth ="INSERT INTO lannionnatation.performance (nomcompet, datecompet, taillebassin, raceid, tempsperf, idnageur) VALUES(:nomcompet, :datecompet, :taillebassin, :raceid, :tempsperf, :idnageur );";
							$req= $connection->prepare($sth);
							$res=$req->execute($tabInfos);
					}
					$enfant = $enfant->nextSibling;
					
				}
			}else{ //Si la course est une course de type RELAY
				$enfant=$noeudResult->firstChild;
				while ($enfant != null){
					if ($enfant->nodeType == XML_ELEMENT_NODE && $enfant->nodeName == 'RELAY'){
						
						$searchNode5 = $enfant->getElementsByTagName("RELAYPOSITION");
						$cpt = 0;
						$swimID = array();
						foreach( $searchNode5 as $searchNode5 )
						{
							if ($searchNode5->getAttribute('clubid') == 1160){
								$cpt ++;
								$swimmerid = $searchNode5->getAttribute('swimmerid');
								array_push($swimID, $swimmerid);
							}
							
						}
					}
					
					if ($enfant->nodeType == XML_ELEMENT_NODE && $enfant->nodeName == 'SPLITS'){
						$swimTIME = array();
						$searchNode6 = $enfant->getElementsByTagName("SPLIT");
						$aa = 0;
						foreach( $searchNode6 as $searchNode6 )
						{
							if ($searchNode5->getAttribute('clubid') == 1160){
								if ($aa >=1){
									$Newswimtime = tempsEnCentieme($searchNode6->getAttribute('swimtime'));
									$time = $Newswimtime-$swimtime;
									array_push($swimTIME, $time);
									$swimtime = $Newswimtime;
								}else{
									$swimtime = tempsEnCentieme($searchNode6->getAttribute('swimtime'));
									array_push($swimTIME, $swimtime);
								}
							$aa++;
							}
							
						}
					}
					$enfant = $enfant->nextSibling;
				}
				$cpt1 = 0;
				foreach ($swimID as $value){// les deux boucles for suivantes servent à ajouter le bon temps à labonne personne
					$cpt2 = 0;
					$cpt3 = -1;
					foreach ($swimTIME as $value2){
						if ($cpt1 == $cpt2){
							//insertion dans la bdd
							$tabInfos=array(':nomcompet'=>$nomCompet,
								':datecompet'=>$dateCompet,
								':taillebassin'=>$poolSize,
								':tempsperf'=>$value2,
								':raceid'=>$raceid,
								':idnageur'=>$value);
							$sth ="INSERT INTO lannionnatation.performance (nomcompet, datecompet, taillebassin, raceid, tempsperf, idnageur) VALUES(:nomcompet, :datecompet, :taillebassin, :raceid, :tempsperf, :idnageur );";
							$req= $connection->prepare($sth);
							$res=$req->execute($tabInfos);
							//fin de l'insertion
						}
						$cpt2++;
						$cpt3++;
					}
					$cpt1++;
				}
			}			
		}
	}
	catch (Exception $e)
	{
		echo'Erreur de connexion à la base de données';
		   die('Erreur : ' . $e->getMessage());
		   echo $e->getMessage();

	}
}

public function insertionxml(){
	
	$this->load->library('form_validation');
	
	$data['content']='insertion_xml';
	$data['title']='Insérer un temps';
	$this->load->vars($data);
	$this->load->view('template');
	if ($this->input->post('sendxml')!==null){
		$this->peuplement($_FILES['mon_fichier']['tmp_name']);
	}
	
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