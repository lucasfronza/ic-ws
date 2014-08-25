<?php

class Messages extends CI_Controller {

    
    public function __construct() 
    {
		parent::__construct();
        $this->load->model('messages_model');
        $this->load->model('user_model');
    }
    
	public function user($idUser)
	{
        $header_menu['title'] = 'PERFIL';
        $header_menu['menu'] = 'PERFIL';
        $this->load->view('main/header_menu', $header_menu);
        
        $data['messages'] = $this->messages_model->get($idUser, $this->session->userdata('id'));
        $data['idTo'] = $idUser;
        $user = $this->user_model->getById($idUser);
        $data['name'] = $user->name.' '.$user->surname;
        
        $this->load->view('messages/index', $data);
	}

    public function insert()
    {
        date_default_timezone_set("America/Sao_Paulo");

        $obj = new stdClass();
        $obj->message = $this->input->post('message');
        $obj->idFrom = $this->session->userdata('id');
        $obj->idTo = $this->input->post('idTo');
        $obj->datetime = date("Y-m-d H:i:s");

        $this->messages_model->insert($obj);
        
        redirect('messages/user/'.$obj->idTo);
    }

    
    
}

/* End of file messages.php */
/* Location: ./application/controllers/messages.php */