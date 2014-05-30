<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
        $this->load->view('signup_form');
        
	}
}

/* End of file signup.php */
/* Location: ./application/controllers/signup.php */