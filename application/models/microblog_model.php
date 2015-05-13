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

    public function getOrderedByUpvotes($idCourse)
    {
        $this->db->select('microblog.*, user.name, user.surname');
        $this->db->from('microblog');
        $this->db->join('user', 'microblog.idUser = user.id');
        return $this->db->order_by('upvotes', 'desc')->where('idCourse', $idCourse)->get()->result();
    }

    public function get($idCourse)
    {
        $this->db->select('microblog.*, user.name, user.surname');
        $this->db->from('microblog');
        $this->db->join('user', 'microblog.idUser = user.id');
        return $this->db->where('idCourse', $idCourse)->get()->result();
    }

    public function insertUpvote($obj)
    {
        $topic = $this->db->where('id', $obj->idTopic)->get('microblog')->row();
        $topic->upvotes = $topic->upvotes + 1;
        $this->db->where('id', $obj->idTopic)->update('microblog', $topic);
        $this->db->insert('microblogupvotes', $obj);
        return $topic->upvotes;
    }

    public function checkUpvote($idTopic, $idUser)
    {
        return $this->db->where('idTopic', $idTopic)->where('idUser', $idUser)->get('microblogupvotes')->row();
    }

    public function deleteUpvote($idTopic, $idUser)
    {
        $topic = $this->db->where('id', $idTopic)->get('microblog')->row();
        $topic->upvotes = $topic->upvotes - 1;
        $this->db->where('id', $idTopic)->update('microblog', $topic);
        $this->db->where('idTopic', $idTopic)->where('idUser', $idUser)->delete('microblogupvotes');
        return $topic->upvotes;
    }

    public function deleteMessage($idTopic, $idCourse)
    {
        return $this->db->where('id', $idTopic)->where('idCourse', $idCourse)->delete('microblog');
    }
  
}