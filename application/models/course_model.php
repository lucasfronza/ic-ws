<?php

class Course_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    
    public function insert($data)
    {
        return $this->db->insert('course', $data);
    }
    
    public function linkUser($data)
	{
		return $this->db->insert('courseusers', $data);
	}
    
    public function getAll()
	{
		return $this->db->get('course')->result();
	}
    
    public function getById($id)
	{
		return $this->db->where('id', $id)->get('course')->row();
	}
    
    public function getId($obj)
	{
		return $this->db->where($array = array('name' => $obj->name,
                                               'code' => $obj->code,
                                               'credits' => $obj->credits,
                                               'time' => $obj->time,
                                               'description' => $obj->description
                                              ))->get('course')->row()->id;
	}
    
}