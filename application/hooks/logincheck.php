<?php
class Logincheck extends CI_Controller {

	public function __construct() 
    {
		parent::__construct();
    }

    # Controle de permissão
    public function logincheck() 
    {
        if($this->uri->segment(1, 0) != "login" && $this->uri->segment(1, 0) != "signup") {
            if($this->session->userdata('logged_in') == null) {
                redirect('login');
            } 
        }
    }
}
?>