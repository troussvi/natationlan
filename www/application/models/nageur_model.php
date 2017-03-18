<?php	
		public function get_nageur($id){
			$res=$db->prepare("SELECT nom,prenom,datenaissance,login,idnageur from _nageurs where idnageur=:id");
			$res->bindParam(':id',$id);
			$query=$this->db->query($res);
			return $query->result_array();			
		}


		public function get_list_nageur(){
			$this->db->select('nom,prenom,datenaissance,login,idnageur');
			$this->db->from('_nageurs');
			$this->db->order_by('nom', 'desc');
			$query=$this->db->get();
			return $query->result_array();	
		}

		


?>