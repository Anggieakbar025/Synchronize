<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class guest_model extends CI_Model {

    public function getGuest()
    {
        return $this->db->get('guest')->result_array();
    }

    public function getLineup($id)
    {
        $this->db->select('*');
        $this->db->from('guest');
        $this->db->where('id_guest', $id);
        return $this->db->get()->result_array();
        
        
        
    }

}

/* End of file guest_model.php */
