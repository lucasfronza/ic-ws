<?php

class Signup extends CI_Controller {

    public function __construct() 
    {
		parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
        $this->load->helper('url');
    }
    
	public function index()
	{
        $header_menu['title'] = 'CADASTRO';
        $header_menu['menu'] = 'CADASTRO';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('signup/new');
	}
    
    public function insert_user()
    {                         //TODO criar um metodo de verificar email
        
        
        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'password' => do_hash($this->input->post('password')),//TODO salvar o MD5, ou outro hashing
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'facebookEmail' => $this->input->post('facebookEmail')
        );
        $this->user_model->set_new_user($data);
        //redirect('signup/success');
        redirect('login/index/signup_success');
        
    }
    
    /*public function success()
    {
        $header_menu['title'] = 'CADASTRO';
        $header_menu['menu'] = 'CADASTRO';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('signup/success');
    }*/
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */