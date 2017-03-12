			
<?php
class Gestion_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}


 public function reinit($email){
	 
		$tab2=array('password'=>md5('LANNION1'));

		$this->db->where('email',$email);
		$this->db->update('_utilisateurs', $tab2);
	 
	 
	 
 }
 
 public function supprimer($email,$nom,$prenom){
	 
	 $nom=strtoupper($nom);
	 $prenom=strtoupper($prenom);
	 
	 $this->db->where('email', $email);
	 $this->db->delete('_utilisateurs');
	 
	 $this->db->where('nom', $nom);
	 $this->db->where('prenom', $prenom);
	 $this->db->where('login', $email);	 
	 $this->db->delete('_nageurs');
	 
	 
	 
	 
	 
	 
 }
 public function gestion($email,$nom,$prenom,$action) {
	 
		$nom=strtoupper($nom);
		$prenom=strtoupper($prenom);
	 
	 if($action==1){
		
		$data = array(
        'attente' => false,
		);

		$this->db->where('nom', $nom);
		$this->db->where('prenom',$prenom);
		$this->db->update('_utilisateurs', $data);
		
		$q=$this
				->db
				->where('nom',$nom)
				->where('prenom',$prenom)
				->get('_nageurs');
		 
		 $nbrows=$q->num_rows();
		 
		 
		 //Si il y a un nageur identique
			if($nbrows == 1){
				
				$this->db->set('login',$email);
				$this->db->where('nom', $nom);
				$this->db->where('prenom',$prenom);
				$this->db->update('_nageurs');
				
				
				
				return true;
				
			}
		//Si il n'y a pas de nageur à ce nom
		
		
			else{
				
				$tab2=array('nom'=>$nom,'prenom'=>$prenom,'datenaissance'=>null,'login'=>$email);
				$this->db->insert('_nageurs',$tab2);
				
				 return true;
			}
		 
		 
		 
	 }
	 
	 
	 
	 if($action==0){
		 
		 		 
		 $this->db->where('email', $email);
		$this->db->delete('_utilisateurs');
		
		 
		 
	 }
	

  }
}        	


