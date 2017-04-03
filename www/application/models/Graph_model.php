			
<?php
class Graph_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

			public function get_nom_epreuve($id){
				 
				 		
				 $sql=("SELECT * from lannionnatation._typeepreuve natural join lannionnatation.performance where idnageur=".$id."  ");			
						
						$query=$this->db->query($sql);
						return $query->result_array(); 
				 
				 
			 }

			public function requete_graph($type_nage,$id,$bassin){
				 
				 		
				 $sql=("SELECT * from lannionnatation._typeepreuve natural join lannionnatation.performance where raceid='".$type_nage."' AND idnageur=".$id." AND taillebassin=".$bassin."  ");			
						
						$query=$this->db->query($sql);
						return $query->result_array(); 
				 
				 
			 }


}


?>
