			
<?php
class User_model extends CI_Model {
public function __construct ()
{
    
$this->load->database() ;

}

 public function verify_user($login, $password) {
     $q = $this
            ->db
            ->where('email', $login)
            ->where('password',md5($password))
            ->limit(1)
            ->get('_utilisateurs');
	

	
	  if ( $q->num_rows() == 1 ) {
		  
		  
		  
		     $q = $this
            ->db
            ->where('email', $login)
            ->where('password',md5($password))
			->where('attente',false)
            ->limit(1)
            ->get('_utilisateurs');
		  
		  $nbrows=$q->num_rows();
		  
		  
		  
		  if($nbrows==1){
			  
			 return $q->row();

			  
		  }
		  else{
			  
			  return false;
			  
		  }
		  
      }
	  else{
		  
      return false;
	  
	  }
  }
}        	


