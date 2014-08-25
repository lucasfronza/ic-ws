<?php

class Messages_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

    public function insert($data)
    {
        return $this->db->insert('messages', $data);
    }
    
    public function delete($id)
    {
        return $this->db->where('id', $id)->delete('messages');
    }

    public function get($id1, $id2)
    {
        $this->db->select('messages.*, user.name, user.surname');
        $this->db->from('messages');
        $this->db->join('user', 'messages.idFrom = user.id');
        return $this->db->order_by('messages.idFrom','DESC')->where(
                array('idTo' => $id1, 'idFrom' => $id2)
            )->or_where(
                array('idTo' => $id2, 'idFrom' => $id1)
            )->get()->result();
    }
  
}