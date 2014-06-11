<?php

class Login extends CI_Controller {

	public function index()
	{
        
        
	}
    
    public function password_reset()//gera uma senha aleatoria nova e manda no email
	{                               //ou utilizar a API com JSON-RPC
                                    //{"jsonrpc":"2.0","method":"generateStrings","params":{"apiKey":"00000000-0000-0000-0000-000000000000","n":1,"length":12,"characters":"!@#$%&*abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM0123456789","replacement":true},"id":15032}
        $this->load->helper('url');
        $config = Array(		
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'lbfronza@gmail.com',
		    'smtp_pass' => $senha_gmail,
		    'smtp_timeout' => '4',
		    'mailtype'  => 'text', 
		    'charset'   => 'iso-8859-1'
		);
 
		$this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        
        $url = "http://www.random.org/strings/?num=1&len=12&digits=on&upperalpha=on&loweralpha=on&unique=on&format=plain&rnd=new";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        //pegar o email por formulario e fazer where(email == email)->update(password=do_hash($result))
        //manda $result para o email
        
        $email = "lucasfronza@yahoo.com.br";
        $this->email->from('lbfronza@gmail.com', 'Lucas Fronza');
        $this->email->to($email);

        $this->email->subject('Recuperação de Senha');
        $this->email->message('Conforme solicitado sua senha foi alterada para "'.$result.'".');	

        if($this->email->send())
        {
            echo $this->email->print_debugger();
        }
        else
        {
            echo "error!";
        }
	}
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */