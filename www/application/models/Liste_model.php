			
<?php
class Liste_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function Nageurs() {
			
			
			$query=$this->db->get('_nageurs');
			
			
			return $query->result_array();
			
	
		 
		 
		 
		 
		 
		 
		 
		 
    

 }
 
 }        	

?>