<?php
class Course extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('course_model');
        $this->load->model('user_model');
        $this->load->model('microblog_model');
	}
    
    public function index()
    {
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $data['courses'] = $this->course_model->getAll();
        //TODO pegar as turmas que o usuario logado participa
        //mostra-las em uma tabela
        $this->load->view('course/list', $data); 
    }
    
    public function manage($id, $message = "")
    {
        //TODO verificar se o usuario tem permissao para acessar
        //a turma
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $data['course'] = $this->course_model->getById($id);
        $data['message'] = $message;
        $this->load->view('course/manage', $data); 
    }

    public function create()
    {
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/new');
    }

    public function insert()
    {
        // Cria o Quadro de Presença
        $curl = curl_init();
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/attendance';

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array('' => '' ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($json);

        // Insere a turma criada no banco de dados
        $course = new stdClass();
        $course->name = $this->input->post('name');
        $course->code = $this->input->post('code');
        $course->credits = $this->input->post('credits');
        $course->time = $this->input->post('time');
        $course->description = $this->input->post('description');
        if($response->status == 1)
        {
            $course->attendanceKey = $response->key;
        }
        // TODO resolver o problema de o serviço retornar status 0 ou não estar funcionando
        $this->course_model->insert($course);
        
        // Insere o usuário que criou a turma nos participantes da mesma
        $obj = new stdClass();
        $obj->idCourse = $this->course_model->getId($course);
        $obj->idUser = $this->session->userdata('id');
        $this->course_model->linkUser($obj);

        redirect('course');
    }
    
    public function edit($id)
    {
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $data['course'] = $this->course_model->getById($id);
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/edit', $data);
    }
    
    public function update()
    {
        $id = $this->input->post('id');
        $course = new stdClass();
        $course->name = $this->input->post('name');
        $course->code = $this->input->post('code');
        $course->credits = $this->input->post('credits');
        $course->time = $this->input->post('time');
        $course->description = $this->input->post('description');
        $this->course_model->update($id, $course);
        
        redirect('course/manage/'.$id);
    }
    
    public function remove($id)
    {
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $data['course'] = $this->course_model->getById($id);
        $this->load->view('course/remove_confirmation', $data);
        
    }
    
    public function delete($id)
    {
        $this->course_model->delete($id);
        
        redirect('course');
    }
    
    public function usersSearch($idCourse)
    {
        $data['idCourse'] = $idCourse;
        
        $name = $this->input->post('name');
        $surname = $this->input->post('surname');
        $data['search'] = $this->user_model->getByNameSurname($name, $surname);
        
        $data['linkedUsers'] = $this->course_model->getLinkedUsers($idCourse);
        
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/users_search', $data);
    }
    
    public function users($idCourse)
    {
        $data['idCourse'] = $idCourse;
        
        $data['linkedUsers'] = $this->course_model->getLinkedUsers($idCourse);
        
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/users', $data);
    }
    
    public function addUser($idCourse, $idUser)
    {
        $obj = new stdClass();
        $obj->idCourse = $idCourse;
        $obj->idUser = $idUser;
        $this->course_model->linkUser($obj);
        
        $data['idCourse'] = $idCourse;
        //TODO apos inserir, voltar para a pagina
        //com a mesma busca anterior
        $data['linkedUsers'] = $this->course_model->getLinkedUsers($idCourse);

        // Adiciona o usuário no Quadro de Presença
        $course = $this->course_model->getById($idCourse);

        $curl = curl_init();
        $url = 'http://localhost/web-services/attendance/user';
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'key' => $course->attendanceKey,
                'user' =>  $idUser,
                'attendance' => 0,
                'absence' => 0
                ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        
        redirect('course/users/'.$idCourse);
    }
    
    public function removeUser($idCourse, $idUser)
    {
        $obj = new stdClass();
        $obj->idCourse = $idCourse;
        $obj->idUser = $idUser;
        $this->course_model->unlinkUser($obj);
        
        $data['idCourse'] = $idCourse;
        //TODO apos remover, voltar para a pagina
        //com a mesma busca anterior
        $data['linkedUsers'] = $this->course_model->getLinkedUsers($idCourse);
        
        redirect('course/users/'.$idCourse);
    }
    
    # Repositório - início
    public function repo($idCourse)
    {   
        $data['idCourse'] = $idCourse;
        $data['files'] = $this->course_model->getFiles($idCourse);
        
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/repository', $data);
    }
    
    public function uploadFile($idCourse)
    {   
        if (!is_dir('uploads/'.$idCourse))
        {
            mkdir('./uploads/' . $idCourse, 0777, TRUE);
            $file = fopen('./uploads/'.$idCourse.'/index.html', "w");
            fwrite($file, 
                "<html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>"
            );
            fclose($file);
        }
        
        $config['upload_path'] = './uploads/'.$idCourse.'/';
        $config['allowed_types'] = 'gif|jpg|png|txt|pdf|rar|zip|doc|docx|odt|xls|xlsx|ppt|pptx|sldx';
        
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
            //echo $error['error'];
            //TODO visualizar o erro
		}
		else
		{
			$data['upload_data'] = $this->upload->data();
            
            $obj = new stdClass();
            $obj->idCourse = $idCourse;
            $obj->name = $data['upload_data']['file_name'];
            $obj->path = base_url('uploads/'.$idCourse.'/'.$data['upload_data']['file_name']);
            $obj->uploadedBy = $this->session->userdata("name")." ".$this->session->userdata("surname");
            date_default_timezone_set("America/Sao_Paulo");
            $obj->modified = date("Y-m-d H:i:s");
            $obj->size = $data['upload_data']['file_size'];
            $this->course_model->insertFile($obj);
            
            //var_dump($data['upload_data']);
            redirect('course/repo/'.$idCourse);
		}
        
    }
    # Repositório - fim

    # Microblog - início
    public function microblog($idCourse)
    {
        $data["messages"] = $this->microblog_model->get($idCourse);
        $data["idCourse"] = $idCourse;

        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/microblog', $data);
    }

    public function microblog_insert()
    {
        $obj = new stdClass();
        $obj->message = $this->input->post('message');
        $obj->idCourse = $this->input->post('idCourse');
        $obj->idUser = $this->session->userdata('id');
        $this->microblog_model->insert($obj);
        
        redirect('course/microblog/'.$obj->idCourse);
    }
    # Microblog - fim

    # Quadro de Presença - início
    public function attendanceBoard($id)
    {
        $course = $this->course_model->getById($id);
        
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/attendance';
        $params = array('key' => $course->attendanceKey);
        $url .= '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $json = curl_exec($ch);
        curl_close($ch);

        $data['board'] = json_decode($json);
        $data['idCourse'] = $id;

        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/attendance', $data);
    }

    public function attendanceUpdate($id, $user, $attendance, $absence)
    {
        $course = $this->course_model->getById($id);
        
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/attendance/user';
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(
                array(
                    'key' => $course->attendanceKey,
                    'user' => $user,
                    'attendance' => $attendance,
                    'absence' => $absence
                )
            ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($ch);
        curl_close($ch);

        redirect('course/attendanceBoard/'.$id);
    }
    # Quadro de Presença - fim
}
?>