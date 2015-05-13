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
        $course = $this->course_model->getById($id);
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $header_menu['course'] = $course;
        $this->load->view('main/header_menu', $header_menu);
        $data['course'] = $course;
        $data['message'] = $message;
        $this->load->view('course/manage', $data); 
    }

    public function create()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/new');
        
    }

    public function insert()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
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
        $response_attendance = json_decode($json);

        // Cria o Quadro de Notas
        $curl = curl_init();
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/board';

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array('' => '' ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        $response_score = json_decode($json);

        // Insere a turma criada no banco de dados
        $course = new stdClass();
        $course->name = $this->input->post('name');
        $course->code = $this->input->post('code');
        $course->teacher = $this->input->post('teacher');
        $course->place = $this->input->post('place');
        $course->credits = $this->input->post('credits');
        $course->time = $this->input->post('time');
        $course->description = $this->input->post('description');
        if($response_attendance->status == 1)
        {
            $course->attendanceKey = $response_attendance->key;
        }
        if($response_score->status == 1)
        {
            $course->scoreKey = $response_score->key;
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
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $course = $this->course_model->getById($id);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $data['course'] = $course;
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/edit', $data);
    }
    
    public function update()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $id = $this->input->post('id');
        $course = new stdClass();
        $course->name = $this->input->post('name');
        $course->code = $this->input->post('code');
        $course->teacher = $this->input->post('teacher');
        $course->place = $this->input->post('place');
        $course->credits = $this->input->post('credits');
        $course->time = $this->input->post('time');
        $course->description = $this->input->post('description');
        $this->course_model->update($id, $course);
        
        redirect('course/manage/'.$id);
    }
    
    public function remove($id)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $data['course'] = $this->course_model->getById($id);
        $this->load->view('course/remove_confirmation', $data);
        
    }
    
    public function delete($id)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
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
        
        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/users_search', $data);
    }
    
    public function users($idCourse)
    {
        $data['idCourse'] = $idCourse;
        
        $data['linkedUsers'] = $this->course_model->getLinkedUsers($idCourse);
        
        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/users', $data);
    }
    
    public function addUser($idCourse, $idUser)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
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

        // Adiciona o usuário no Quadro de Notas
        $course = $this->course_model->getById($idCourse);

        $curl = curl_init();
        $url = 'http://localhost/web-services/board/user';
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'key' => $course->scoreKey,
                'user' =>  $idUser,
                'score' => 0
                ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        
        redirect('course/users/'.$idCourse);
    }
    
    public function removeUser($idCourse, $idUser)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
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
        
        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/repository', $data);
    }
    
    public function uploadFile($idCourse)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
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
        $config['allowed_types'] = 'gif|jpg|png|txt|pdf|rar|zip|doc|docx|odt|xls|xlsx|ppt|pptx|sldx|ods';
        $path_info = pathinfo($_FILES['userfile']['name']);
        $config['file_name'] = url_title($path_info['filename']);

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
            $obj->path = base_url('uploads/'.$idCourse).'/'.$data['upload_data']['file_name'];
            $obj->uploadedBy = $this->session->userdata("name")." ".$this->session->userdata("surname");
            date_default_timezone_set("America/Sao_Paulo");
            $obj->modified = date("Y-m-d H:i:s");
            $obj->size = $data['upload_data']['file_size'];
            $this->course_model->insertFile($obj);
            
            // Envio de email para os participantes avisando que o novo arquivo foi inserido
            require_once('application/config/gmail.php');
            $course = $this->course_model->getById($idCourse);
            $users = $this->course_model->getLinkedUsers($idCourse);
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

            $this->email->from('lbfronza@gmail.com', 'ICMC MLE');
            $this->email->subject('Novo arquivo no Repositório');
            $this->email->message(
                'O arquivo '.$data['upload_data']['file_name'].' foi adicionado no Repositório da turma '.$course->name.
                ' por '.$this->session->userdata("name").' '.$this->session->userdata("surname").'.'
                );
            foreach ($users as $user)
            {
                if($user->notifications == 1)
                {
                    $this->email->to($user->email);
                    $this->email->send();
                }
            }

            redirect('course/repo/'.$idCourse);
        }
        
    }

    public function removeFile($idCourse, $id)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $file = $this->course_model->getFile($idCourse, $id);
        unlink('uploads/'.$idCourse.'/'.$file->name);
        $this->course_model->deleteFile($idCourse, $id);
        redirect('course/repo/'.$idCourse);
    }
    # Repositório - fim

    # Microblog - início
    public function microblog($idCourse)
    {
        $data["topics"] = $this->microblog_model->getOrderedByUpvotes($idCourse);
        $data["messages"] = $this->microblog_model->get($idCourse);
        $data["idCourse"] = $idCourse;

        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/microblog', $data);
    }

    public function microblog_insert()
    {
        $obj = new stdClass();
        $obj->message = $this->input->post('message');
        $obj->idCourse = $this->input->post('idCourse');
        $obj->parent = $this->input->post('parent');
        $obj->idUser = $this->session->userdata('id');
        $this->microblog_model->insert($obj);

        // Envio de email para os participantes avisando que um novo tópico foi criado
        if($obj->parent == 0)
        {
            require_once('application/config/gmail.php');
            $course = $this->course_model->getById($obj->idCourse);
            $users = $this->course_model->getLinkedUsers($obj->idCourse);
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

            $this->email->from('lbfronza@gmail.com', 'ICMC MLE');
            $this->email->subject('Novo tópico no Microblog');
            $this->email->message(
                'Um novo tópico chamado "'.$obj->message.'" foi criado no Microblog da turma '.$course->name.
                ' por '.$this->session->userdata("name").' '.$this->session->userdata("surname").'.'
                );
            foreach ($users as $user)
            {
                if($user->notifications == 1)
                {
                    $this->email->to($user->email);
                    $this->email->send();
                }
            }
        }

        redirect('course/microblog/'.$obj->idCourse);
    }

    public function microblogUpvote($idCourse, $idTopic)
    {
        $idUser = $this->session->userdata('id');

        if($this->microblog_model->checkUpvote($idTopic, $idUser))
        {
            $upvotes = $this->microblog_model->deleteUpvote($idTopic, $idUser);
        }
        else
        {
            $obj = new stdClass();
            $obj->idTopic = $idTopic;
            $obj->idUser = $idUser;
            $upvotes = $this->microblog_model->insertUpvote($obj);
        }

        $array = array('upvotes' => $upvotes);
        echo json_encode($array);
        //redirect('course/microblog/'.$idCourse);
    }

    public function microblogRemoveMessage($idCourse, $idTopic)
    {
        $idUser = $this->session->userdata('id');

        if($this->session->userdata('id') != $idUser && $this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course/microblog/'.$idCourse);
        }

        $this->microblog_model->deleteMessage($idTopic, $idCourse);

        redirect('course/microblog/'.$idCourse);
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

        $board = json_decode($json);
        $board = $this->user_model->getNamesById($board);
        $data['board'] = $board;
        $data['idCourse'] = $id;

        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/attendance', $data);
    }

    public function attendanceUpdate($id, $user, $attendance, $absence)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $course = $this->course_model->getById($id);
        
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/attendance/user';
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            /*CURLOPT_CUSTOMREQUEST => 'PUT',*/
            CURLOPT_POSTFIELDS => http_build_query(
                array(
                    'key' => $course->attendanceKey,
                    'user' => $user,
                    'attendance' => $attendance,
                    'absence' => $absence
                )
            ),
            CURLOPT_HTTPHEADER => array("Accept: application/json", 'X-HTTP-Method-Override: PUT')
        ));
        $json = curl_exec($ch);
        curl_close($ch);

        redirect('course/attendanceBoard/'.$id);
    }
    # Quadro de Presença - fim

    # Quadro de Notas - início
    public function scoreBoard($idCourse)
    {
        $course = $this->course_model->getById($idCourse);
        
        //$url = 'http://lucasfronza.com.br/web-services/index.php/attendance';
        $url = 'http://localhost/web-services/board';
        $params = array('key' => $course->scoreKey);
        $url .= '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $json = curl_exec($ch);
        curl_close($ch);

        $board = json_decode($json);
        $board = $this->user_model->getNamesById($board);
        $data['board'] = $board;
        $data['idCourse'] = $idCourse;
        $data['scoreKey'] = $course->scoreKey;

        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/score_board', $data);
    }

    public function scoreUpdate()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $id         = $this->input->post('id');
        $scoreKey   = $this->input->post('scoreKey');
        $idCourse   = $this->input->post('idCourse');
        $score      = $this->input->post('score');

        $url = 'http://localhost/web-services/board/user';
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            /*CURLOPT_CUSTOMREQUEST => 'PUT',*/
            CURLOPT_POSTFIELDS => http_build_query(
                array(
                    'key' => $scoreKey,
                    'id' => $id,
                    'score' => $score
                )
            ),
            CURLOPT_HTTPHEADER => array("Accept: application/json", 'X-HTTP-Method-Override: PUT')
        ));
        $json = curl_exec($ch);
        curl_close($ch);

        redirect('course/scoreBoard/'.$idCourse);
    }
    # Quadro de Notas - fim

    # Quiz - início
    public function quiz($idCourse)
    {
        $quizzes = $this->course_model->getQuizzes($idCourse);

        $data['quizzes'] = $quizzes;
        $data['idCourse'] = $idCourse;

        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/quiz_management', $data);
    }

    public function addQuiz($idCourse)
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $data['idCourse'] = $idCourse;

        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/quiz_new', $data);
    }

    public function insertQuiz()
    {
        if($this->session->userdata('type') != 'administrador' && $this->session->userdata('type') != 'professor')
        {
            redirect('course');
        }
        $idCourse   = $this->input->post('idCourse');
        $name   = $this->input->post('name');
        $question      = $this->input->post('question');
        $comment       = $this->input->post('comment');
        $alternative1  = $this->input->post('alternative1');
        $alternative2  = $this->input->post('alternative2');
        $alternative3  = $this->input->post('alternative3');
        $alternative4  = $this->input->post('alternative4');
        $alternative5  = $this->input->post('alternative5');
        $correctAnswer = $this->input->post('correctAnswer');

        // Cria o Quiz
        $curl = curl_init();
        $url = 'http://localhost/web-services/quiz';
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'question' => $question,
                'comment' => $comment,
                'alternative1'  => $alternative1,
                'alternative2'  => $alternative2,
                'alternative3'  => $alternative3,
                'alternative4'  => $alternative4,
                'alternative5'  => $alternative5,
                'correctAnswer' => $correctAnswer
            ),
            CURLOPT_HTTPHEADER => array("Accept: application/json")
        ));
        $json = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($json);

        $obj = new stdClass();
        $obj->idCourse = $idCourse;
        $obj->name = $name;
        $obj->quizKey = $response->key;
        $this->course_model->insertQuiz($obj);

        redirect('course/quiz/'.$idCourse);
    }

    public function quizQuestion($idCourse, $idQuiz)
    {
        $quiz = $this->course_model->getQuiz($idQuiz);

        $url = 'http://localhost/web-services/quiz';
        $params = array('key' => $quiz->quizKey);
        $url .= '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $json = curl_exec($ch);
        curl_close($ch);

        $data['quizName'] = $quiz->name;
        $data['quiz'] = json_decode($json);
        $data['idCourse'] = $idCourse;
        $data['idQuiz'] = $quiz->id;

        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/quiz_question', $data);
    }

    public function quizCheck()
    {
        $idCourse       = $this->input->post('idCourse');
        $idQuiz         = $this->input->post('idQuiz');
        $selectedAnswer = $this->input->post('optionsRadios');
        $correctAnswer  = $this->input->post('correctAnswer');

        if($selectedAnswer == $correctAnswer)
        {
            $data['message'] = 'correct';
        }
        else
        {
            $data['message'] = 'wrong';
        }

        $quiz = $this->course_model->getQuiz($idQuiz);

        $url = 'http://localhost/web-services/quiz';
        $params = array('key' => $quiz->quizKey);
        $url .= '?' . http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
        $json = curl_exec($ch);
        curl_close($ch);

        $data['idCourse'] = $idCourse;
        $data['idQuiz'] = $idQuiz;
        $data['quiz'] = json_decode($json);

        $course = $this->course_model->getById($idCourse);
        $header_menu['course'] = $course;
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = '';
        $this->load->view('main/header_menu', $header_menu);
        $this->load->view('course/quiz_check', $data);
    }
    # Quiz - fim
}
?>