<?php
class Inscription_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function verify_user($email, $password,$name,$firstname,$date,$sexe) {
 
 //on met nom et prénom en majuscule pour éviter les pb de doublons
     $name=strtoupper($name);
	 $firstname=strtoupper($firstname);
//tableau des infos de l'utilisateur
	$tab=array('nom'=>$name,'prenom'=>$firstname,'password'=>md5($password),'email'=>$email,'date'=>$date,'sexe'=>$sexe);
     
     
	 //on regarde si l'email est déjà répertorié
     $q = $this
            ->db
            ->where('email', $email)
            ->limit(1)
            ->get('_utilisateurs');


	$nbrows=$q->num_rows();

	//si in'est pas répertorié
      if ( $nbrows == 0 ) {
        

				$this->db->insert('_utilisateurs', $tab);
				
				return true;
				
			}

		
		
         
      
	  
	  
      else{
		  
		  
		  return false;
		  
	
	 }
      
 }  
      
      
      
  
}