<?php

class Signup extends CI_Controller {

	public function index()
	{
        $this->load->view('signup/new');
	}
    
    public function new_user()//TODO cadastro esta aceitando emails e username iguais
    {
        $this->load->helper('form');
        $this->load->library('form_validation');


        $this->form_validation->set_rules('name', 'Nome', 'required');
        $this->form_validation->set_rules('surname', 'Sobrenome', 'required');
        $this->form_validation->set_rules('username', 'Nome de usuário', 'required');
        $this->form_validation->set_rules('password', 'Senha', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('signup/new');
        }
        else
        {
            $this->load->model('newuser_model');
            $this->newuser_model->set_new_user();
            $this->load->view('signup/success');
        }
    }
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */