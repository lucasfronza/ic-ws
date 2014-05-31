<?php

class Newuser_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    
    public function set_new_user()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),//TODO salvar o MD5, ou outro hashing
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state')
        );

        return $this->db->insert('user', $data);
    }
}