<?php

class Login extends CI_Controller {

	public function index()
	{
        
	}
    
    public function password_reset()//gera uma senha aleatoria nova e manda no email
	{                               //utilizar um web service para a senha aleatoria
                                    //http://www.random.org/strings/?num=1&len=12&digits=on&upperalpha=on&loweralpha=on&unique=on&format=plain&rnd=new
                                    //utilizar http get request
                                    //ou utilizar a API com JSON-RPC
                                    //{"jsonrpc":"2.0","method":"generateStrings","params":{"apiKey":"00000000-0000-0000-0000-000000000000","n":1,"length":12,"characters":"!@#$%&*abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM0123456789","replacement":true},"id":15032}
        
	}
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */