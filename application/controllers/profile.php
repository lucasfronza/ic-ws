<?php

class Profile extends CI_Controller {

    
    public function __construct() 
    {
		parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
    }
    
	public function index()
	{
        $header_menu['title'] = 'PERFIL';
        $header_menu['menu'] = 'PERFIL';
        $this->load->view('main/header_menu', $header_menu);
        
        $data['user'] = $this->user_model->getById($this->session->userdata('id'));
        $this->load->view('profile/index', $data);
	}

    public function user($idUser)
    {
        $header_menu['title'] = 'PERFIL';
        $header_menu['menu'] = 'PERFIL';
        $this->load->view('main/header_menu', $header_menu);
        
        $data['user'] = $this->user_model->getById($idUser);
        $this->load->view('profile/user', $data);
    }
    
    public function edit()
    {
        $header_menu['title'] = 'PERFIL';
        $header_menu['menu'] = 'PERFIL';
        $this->load->view('main/header_menu', $header_menu);
        
        $data['user'] = $this->user_model->getById($this->session->userdata('id'));
        $this->load->view('profile/edit', $data);
    }
        
    public function update()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state')
        );
        
        if( !empty($this->input->post('password')) )
        {
            $data['password'] = do_hash($this->input->post('password'));
        }
        
        $this->user_model->updateUser($this->session->userdata('id'), $data);
        redirect('profile/index');
    }
    
    public function password_recovery()
    {
        $header_menu['title'] = 'LOGIN';
        $header_menu['menu'] = 'LOGIN';
        $this->load->view('main/header_menu', $header_menu);
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
                $header_menu['title'] = 'LOGIN';
                $header_menu['menu'] = 'LOGIN';
                $this->load->view('main/header_menu', $header_menu);
                $data['email'] = $email;
                $this->load->view('login/reset_success', $data);
            }
            else
            {
                $header_menu['title'] = 'LOGIN';
                $header_menu['menu'] = 'LOGIN';
                $this->load->view('main/header_menu', $header_menu);
                $data['message'] = 'Erro ao recuperar senha!';
                $this->load->view('login/error', $data);
            }
        }
	}
    
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */