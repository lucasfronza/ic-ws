<?php

class Signup_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    
    public function set_new_user($data)
    {
        return $this->db->insert('user', $data);
    }
}