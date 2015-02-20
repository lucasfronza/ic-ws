<?php
class Users extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('user_model');
	}
    
    public function index()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $header_menu['title'] = 'USUÁRIOS';
        $header_menu['menu'] = 'USUÁRIOS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('users/index'); 
    }
    
    public function search()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $data['search'] = $this->user_model->getByNameSurname($name, $surname);
        
        $header_menu['title'] = 'USUÁRIOS';
        $header_menu['menu'] = 'USUÁRIOS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('users/search', $data);
    }
    
    public function edit($idUser)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $data['user'] = $this->user_model->getById($idUser);
        
        $header_menu['title'] = 'USUÁRIOS';
        $header_menu['menu'] = 'USUÁRIOS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('users/edit', $data);
    }

    public function update()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $idUser = $this->input->post('id');
        $data = array(
            'type' => $this->input->post('type')
        );
        
        $this->user_model->updateUser($idUser, $data);
        redirect('users/edit/'.$idUser);
    }
}
?>