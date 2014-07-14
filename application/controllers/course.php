<?php
class Course extends CI_Controller {

	public function __construct() 
    {
		parent::__construct();
        $this->load->model('course_model');
        $this->load->model('user_model');
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
    
    public function manage($id)
    {
        //TODO verificar se o usuario tem permissao para acessar
        //a turma
        $header_menu['title'] = 'TURMAS';
        $header_menu['menu'] = 'TURMAS';
        $this->load->view('main/header_menu', $header_menu);
        $data['course'] = $this->course_model->getById($id);
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
        $course = new stdClass();
        $course->name = $this->input->post('name');
        $course->code = $this->input->post('code');
        $course->credits = $this->input->post('credits');
        $course->time = $this->input->post('time');
        $course->description = $this->input->post('description');
        $this->course_model->insert($course);
        
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

}
?>