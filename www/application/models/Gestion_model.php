			
<?php
class Gestion_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function gestion($email,$nom,$prenom,$action) {
	 
	 
	 
	 if($action==1){

		$data = array(
        'login' => $email,
		);

		$this->db->where('nom', $nom);
		$this->db->where('prenom',$prenom);
		$this->db->update('_nageurs', $data);
		
		$data = array(
        'attente' => false,
		);

		$this->db->where('nom', $nom);
		$this->db->where('prenom',$prenom);
		$this->db->update('_utilisateurs', $data);
		
	
		 
		 
		 
	 }
	 
	 
	 
	 if($action==0){
		 
		 		 
		 $this->db->where('email', $email);
		$this->db->delete('_utilisateurs');
		
		 
		 
	 }
	

  }
}        	


