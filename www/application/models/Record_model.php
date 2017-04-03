<?php	
class Record_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

		function get_record($taillebassin,$sexe){

	 		$sql=("SELECT * FROM lannionnatation.performance natural join lannionnatation._typeepreuve natural join lannionnatation._nageurs where taillebassin=".$taillebassin." AND sexe='".$sexe."'");
			$query=$this->db->query($sql);
			return $query->result_array(); 	

		}

		function get_type_epreuve($id,$taillebassin,$sexe){

	 		$sql=("SELECT * FROM lannionnatation.performance natural join lannionnatation._typeepreuve natural join lannionnatation._nageurs where taillebassin=".$taillebassin." AND sexe='".$sexe."' AND raceid=".$id."");
			$query=$this->db->query($sql);
			return $query->result_array(); 	

		}

		function get_max_record($taillebassin,$sexe,$raceid){
	 		$sql=("SELECT * FROM lannionnatation.performance natural join lannionnatation._typeepreuve natural join lannionnatation._nageurs where taillebassin=".$taillebassin." AND sexe='".$sexe."' AND raceid='".$raceid."' ORDER BY tempsperf LIMIT 1");
			$query=$this->db->query($sql);
			return $query->result_array(); 				
		}
	
}
?>