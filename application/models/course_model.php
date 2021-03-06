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
    
    public function insertFile($data)
    {
        return $this->db->insert('coursefiles', $data);
    }
    
    public function getFiles($idCourse)
	{
		return $this->db->where('idCourse', $idCourse)->get('coursefiles')->result();
	}

  public function getFile($idCourse, $id)
  {
    return $this->db->where('idCourse', $idCourse)->where('id', $id)->get('coursefiles')->row();
  }

  public function deleteFile($idCourse, $id)
  {
    return $this->db->where('idCourse', $idCourse)->where('id', $id)->delete('coursefiles');
  }

  public function insertQuiz($obj)
  {
      return $this->db->insert('coursequizzes', $obj);
  }

  public function getQuizzes($idCourse)
  {
    return $this->db->where('idCourse', $idCourse)->get('coursequizzes')->result();
  }

  public function getQuiz($idQuiz)
  {
    return $this->db->where('id', $idQuiz)->get('coursequizzes')->row();
  }

  public function insertQuizAnswer($obj)
  {
    $answer = $this->db->where(
      array('idCourse' => $obj->idCourse,
       'idUser' => $obj->idUser,
       'idQuiz' => $obj->idQuiz
      ))->get('quizanswers')->row();
    if (empty($answer)) {
      return $this->db->insert('quizanswers', $obj);
    } else {
      return false;
    }
  }

  public function getQuizResponses($idUser, $idCourse)
  {
    $obj = new stdClass();
    $obj->answers = $this->db->where(
      array('idCourse' => $idCourse,
       'idUser' => $idUser
      ))->count_all_results('quizanswers');
    $obj->questions = $this->db->where('idCourse', $idCourse)->count_all_results('coursequizzes');
    return $obj;
  }
}