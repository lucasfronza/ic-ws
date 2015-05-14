<?php

class Login extends CI_Controller {

    
    public function __construct() 
    {
		parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('security');
    }
    
    
	public function index($message = "")
	{
        $this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

        $user = $this->facebook->getUser();
        
        //print_r($user);

        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                redirect('login/authenticate');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }/*else {
            $this->facebook->destroySession();
        }*/
        
        if ($user) {

            //$data['logout_url'] = site_url('login/end_fb'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('login/authenticate'),
                'scope' => array('email') // permissions here
            ));
        }
        //$this->load->view('login/login',$data);

        $data["message"] = $message;

        $header_menu['title'] = 'LOGIN';
        $header_menu['menu'] = 'LOGIN';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('login/form', $data);
	}
    
    public function authenticate()
    {
        $this->load->library('facebook');

        $fb_user = $this->facebook->getUser();
        
        if ($fb_user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
                //print_r($this->facebook->api('/me'));
                $query = $this->user_model->getByFacebookEmail($data['user_profile']['email']);
                if (!empty($query)) {//se o facebook ja esta linkado com uma conta
                    $sess = array(
                        'logged_in' => TRUE,
                        'id'        => $query->id,
                        'email'     => $query->email,
                        'name'      => $query->name,
                        'surname'   => $query->surname,
                        'type'      => $query->type
                    );
                    $this->session->set_userdata($sess);
                    redirect('course');
                    //redirect('login/success');
                } else {
                    
                    $header_menu['title'] = 'LOGIN';
                    $header_menu['menu'] = 'LOGIN';
                    $this->load->view('main/header_menu', $header_menu);
                    $this->load->view('login/link', $data);//escolhe entre linkar conta ou criar cadastro
                }

            } catch (FacebookApiException $e) {
                $fb_user = null;
            }
        } else {
            $this->facebook->destroySession();
        
            $email = $this->input->post('email');
            $password = do_hash($this->input->post('password'));
            $query = $this->user_model->getByEmail($email);
            
            if(empty($query)) {
                //redirect('login/error/email_not_found');
                redirect('login/index/email_not_found');
            } else if($query->password == $password) {
                $sess = array(
        			'logged_in' => TRUE,
        			'id'        => $query->id,
        			'email'     => $query->email,
        			'name'      => $query->name,
        			'surname'   => $query->surname,
        			'type'      => $query->type
        		);
        		$this->session->set_userdata($sess);
                
                redirect('course');
                //redirect('login/success');
            } else {
                //redirect('login/error/wrong_pass');
                redirect('login/index/wrong_pass');
            }
        }
    }

    public function fb_link()
    {
        $email = $this->input->post('email');
        $password = do_hash($this->input->post('password'));
        $query = $this->user_model->getByEmail($email);

        if(empty($query)) {
            //redirect('login/error/email_not_found');
            redirect('login/index/email_not_found');
        } else if($query->password == $password) {
            $this->load->library('facebook');

            $fb_user = $this->facebook->getUser();
            $user_profile = $this->facebook->api('/me');

            $query->facebookEmail = $user_profile['email'];
            $this->user_model->updateUser($query->id, $query);

            redirect('login/authenticate');
        } else {
            //redirect('login/error/wrong_pass');
            redirect('login/index/wrong_pass');
        }
    }
    
    public function end()
	{
        $this->load->library('facebook');

        $this->facebook->destroySession();

		$this->session->sess_destroy();

        redirect('login/index/logout_success');
		/*$header_menu['title'] = 'LOGOUT';
		$header_menu['menu'] = 'LOGOUT';
		$this->load->view('main/header_menu', $header_menu);
		$this->load->view('login/end');*/
	}
    
    public function success()
    {
        $header_menu['title'] = 'LOGIN';
        $header_menu['menu'] = 'LOGIN';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('login/success');
    }
    
    public function password_recovery()
    {
        $header_menu['title'] = 'LOGIN';
        $header_menu['menu'] = 'LOGIN';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('login/recovery');
    }
    
    public function password_reset() 
	{                               
        /*//gera uma senha aleatoria nova e manda no email
        //ou utilizar a API com JSON-RPC
        //{"jsonrpc":"2.0","method":"generateStrings","params":{"apiKey":"00000000-0000-0000-0000-000000000000","n":1,"length":12,"characters":"!@#$%&*abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM0123456789","replacement":true},"id":15032}
        */
        //$this->load->helper('url');
        
        require_once('application/config/gmail.php');

        $email = $this->input->post('email');
        $query = $this->user_model->getByEmail($email);
        
        if(empty($query)) {
            //redirect('login/error/email_not_found');
            redirect('login/index/email_not_found');
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
                redirect('login/index/reset_success');
                /*$header_menu['title'] = 'LOGIN';
                $header_menu['menu'] = 'LOGIN';
                $this->load->view('main/header_menu', $header_menu);
                $data['email'] = $email;
                $this->load->view('login/reset_success', $data);*/
            }
            else
            {
                redirect('login/index/password_recovery');
                /*$header_menu['title'] = 'LOGIN';
                $header_menu['menu'] = 'LOGIN';
                $this->load->view('main/header_menu', $header_menu);
                $data['message'] = 'Erro ao recuperar senha!';
                $this->load->view('login/error', $data);*/
            }
        }
	}
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */