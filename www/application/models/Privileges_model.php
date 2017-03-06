			
<?php
class Privileges_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function Utilisateur() {

		  /*On renvoi ici les gens dont le statut est " EN Attente'" */
		  $q2=$this->db->where('attente',true)->get('_utilisateurs');
		  
		  if($q2->num_rows <> 0){
			  
			  
			  
         return $q2->row();
			  
		  }
		  
		  
		  
		return false;
		 
		 
    

 }
 
 }        	

?>