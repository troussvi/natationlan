<?php	
class Nageur_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

		function get_nageur($id){

	 		$sql=("SELECT nom,prenom,datenaissance,login,idnageur from lannionnatation._nageurs where idnageur=".$id."");
			$query=$this->db->query($sql);
			return $query->result_array(); 	
		}


		function get_perf($id){
	 		$sql=("SELECT * from lannionnatation.realise natural join lannionnatation.performance natural join lannionnatation.type_epreuve where idnageur=".$id."");
			$query=$this->db->query($sql);
			return $query->result_array(); 	
		}
	
}
?>