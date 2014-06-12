<?php

class Login extends CI_Controller {

    
    public function __construct() 
    {
		parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
        $this->load->helper('url');
    }
    
	public function index()
	{
        $this->load->view('login/form');
	}
    
    public function authenticate()
    {
        
        $email = $this->input->post('email');
        $password = do_hash($this->input->post('password'));
        $query = $this->user_model->getByEmail($email);
        
        if(empty($query)) {
            redirect('login/error/email_not_found');
        } else if($query->password == $password) {
            redirect('login/success');
        } else {
            redirect('login/error/wrong_pass');
        }
    }
    
    public function error()
    {
        $uri = $this->uri->segment(3, 0);
        if($uri == 'email_not_found') {
            $data['message'] = 'Email não encontrado!';
        } else {
            $data['message'] = 'Senha inválida!';   
        }
        $this->load->view('login/error', $data);
        
    }
    
    public function success()
    {
        
        $this->load->view('login/success');
    }
    
    public function password_recovery()
    {
        $this->load->view('login/recovery');
    }
    
    public function password_reset()//gera uma senha aleatoria nova e manda no email
	{                               //ou utilizar a API com JSON-RPC
                                    //{"jsonrpc":"2.0","method":"generateStrings","params":{"apiKey":"00000000-0000-0000-0000-000000000000","n":1,"length":12,"characters":"!@#$%&*abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM0123456789","replacement":true},"id":15032}
        //$this->load->helper('url');
        
        $email = $this->input->post('email');
        $query = $this->user_model->getByEmail($email);
        
        if(empty($query)) {
            redirect('login/error/email_not_found');
        } else {
            
            $config = Array(		
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $emailgmail,
                'smtp_pass' => $senhagmail,
                'smtp_timeout' => '4',
                'mailtype'  => 'text', 
                'charset'   => 'utf-8'
            );
 
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $url = "http://www.random.org/strings/?num=1&len=14&digits=on&upperalpha=on&loweralpha=on&unique=on&format=plain&rnd=new";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            
            $result = substr($result, 0, 12);

            $this->user_model->updatePassword($email, do_hash($result));
            
            $this->email->from('lbfronza@gmail.com', 'Lucas Fronza');
            $this->email->to($email);

            $this->email->subject('Recuperação de Senha');
            $this->email->message('Conforme solicitado sua senha foi alterada para "'.$result.'".');	

            if($this->email->send())
            {
                $data['email'] = $email;
                $this->load->view('login/reset_success', $data);
            }
            else
            {
                $data['message'] = 'Erro ao recuperar senha!';
                $this->load->view('login/error', $data);
            }
        }
	}
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */