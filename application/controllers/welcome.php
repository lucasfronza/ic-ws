<?php

class Welcome extends CI_Controller {

    
    public function __construct() 
    {
		parent::__construct();
    }
     
	public function index()
	{
        $header_menu['title'] = 'WELCOME';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('welcome/index', $header_menu);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */