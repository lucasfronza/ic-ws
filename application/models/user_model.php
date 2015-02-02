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
    
    public function getByFacebookEmail($email)
    {
        return $this->db->where('facebookEmail', $email)->get('user')->row();
    }

    public function getById($id)
	{
		return $this->db->where('id', $id)->get('user')->row();
	}
    
    public function updateUser($id, $data)
	{
		return $this->db->where('id', $id)->update('user', $data);
	}
    
    public function updatePassword($email, $password)
    {
        return $this->db->where('email', $email)->update('user', array('password' => $password));
    }
    
    public function getByNameSurname($name, $surname)
    {
        if(empty($name) && !empty($surname))
        {
            $this->db->like('surname', $surname);
        }
        else if(!empty($name) && empty($surname))
        {
            $this->db->like('name', $name);
        }
        else if(!empty($name) && !empty($surname))
        {
            $this->db->like('surname', $surname);
            $this->db->like('name', $name);
        }
        
        return $this->db->get('user')->result();
        
    }

    public function getNamesById($obj)
    {
        foreach ($obj as $item)
        {
            $user = $this->db->where('id', $item->user)->get('user')->row();
            $item->name = $user->name.' '.$user->surname;
        }
        return $obj;
    }
    
}