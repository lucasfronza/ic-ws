<?php

class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    
    public function set_new_user($data)
    {
        return $this->db->insert('user', $data);
    }
    
    public function getByEmail($email)
	{
		return $this->db->where('email', $email)->get('user')->row();
	}
    
    public function updatePassword($email, $password)
    {
        return $this->db->where('email', $email)->update('user', array('password' => $password));
    }
    
}