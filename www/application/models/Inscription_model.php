<?php
class Inscription_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function verify_user($email, $password,$name,$firstname) {
 
     
	$tab=array('nom'=>$name,'prenom'=>$firstname,'password'=>md5($password),'email'=>$email);
     
     
     $q = $this
            ->db
            ->where('email', $email)
            ->where('password',$password)
            ->limit(1)
            ->get('_utilisateurs');





      if ( $q->num_rows = 0 ) {
        
        return true;     
         
      }
      else{
          
		  $q=$this
				->db
				->where('nom',$name)
				->where('prenom',$firstname)
				->get('_nageurs');
				
			if($q->num_rows=0){
				
				return true;
				
			}
			
			else{

				$this->db->insert('_utilisateurs', $tab);
				
				 
				return false;

			}
	 }
      
      
      
      
      
  }
}