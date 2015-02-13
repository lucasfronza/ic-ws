<?php

class Microblog_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function insert($data)
    {
        return $this->db->insert('microblog', $data);
    }
    
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('microblog');
    }

    public function get($idCourse)
    {
        $this->db->select('microblog.*, user.name, user.surname');
        $this->db->from('microblog');
        $this->db->join('user', 'microblog.idUser = user.id');
        return $this->db->where('idCourse', $idCourse)->get()->result();
    }
  
}