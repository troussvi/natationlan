<?php
  
class nageur_model extends CI_Model
{  
    public function get_nageur($data)
    {      
        $this->db->from('_nageurs');
        $this->db->order_by("nom", "prenom");
        $q = $this->db->get();
        if($q->num_rows()>0)
        {
            foreach($q->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
}

>