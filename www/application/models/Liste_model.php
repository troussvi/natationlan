			
<?php
class Liste_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function NageursSeniors() {
			
			
			
			
	 $sql=("SELECT * from lannionnatation._nageurs where DATE_PART('year',datenaissance)-DATE_PART('year', current_date)<-18");
			
			
			$query=$this->db->query($sql);
			return $query->result_array();
			
			
	
	
		 
		 
		 
		 
		 
		 
		 
		 
    

 }
 
 
 public function NageursJuniors(){
	 
	 		
	 $sql=("SELECT * from lannionnatation._nageurs where DATE_PART('year',datenaissance)-DATE_PART('year', current_date)>-18");
			
			
			$query=$this->db->query($sql);
			return $query->result_array();
			
	 
	 
	 
	 
	 
	 
 }
 
 }        	

?>