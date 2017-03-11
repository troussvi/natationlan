			
<?php
class Privileges_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function Utilisateur() {

		  /*On renvoi ici les gens dont le statut est " EN Attente'" */
		  $q2=$this->db->where('attente',true)->get('_utilisateurs');
		 

		 $q2->num_rows();

		 if($q2->num_rows <> 0){
			  
			  
			return $q2->result_array();
			  
		 }
		  
		  
		  
		return false;
		 
		 
    

 }
 
 }        	

?>