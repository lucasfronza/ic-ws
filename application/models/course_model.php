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
    
    public function update($id, $data)
	{
        return $this->db->where('id', $id)->update('course', $data);
	}
    
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('course');
    }
    
    public function linkUser($data)
	{
		return $this->db->insert('courseusers', $data);
	}
    
    public function unlinkUser($obj)
	{
		return $this->db->where($array = array('idCourse' => $obj->idCourse, 
                                               'idUser' => $obj->idUser
                                              ))->delete('courseusers');
	}
    
    public function getLinkedUsers($idCourse)
	{
		//return $this->db->where('idCourse', $idCourse)->get('courseusers')->result();
        return $this->db->query('
			SELECT courseusers.*, user.* FROM courseusers INNER JOIN user ON courseusers.idUser = user.id WHERE courseusers.idCourse = '.$idCourse)->result();
        
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