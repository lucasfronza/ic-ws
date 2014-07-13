<?php
class Course extends CI_Controller {

	public function __construct() 
    {
		parent::__construct();
        $this->load->model('course_model');
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
        $obj->idUser = 20; //TODO salvar o id do usuario logado
        $this->course_model->linkUser($obj);
        redirect('course');
    }
    
    /*public function gerenciamento()
    {
        $idCurso = $this->uri->segment(3, 0);
        $inicio = $this->uri->segment(4, 0);

        $config['base_url'] = site_url('curso/gerenciamento/'.$idCurso);
        $config['total_rows'] = $this->curso_model->countDisciplinas($idCurso);
        $config['per_page'] = '5'; 
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $dados["paginacao"] = $this->pagination->create_links();
        $dados['curso'] = $this->curso_model->get($idCurso);
        $dados['disciplinas'] = $this->curso_model->getDisciplinas($idCurso, $inicio, 5);

        $this->load->view('curso/gerenciamento', $dados);
    }

    public function retirar() 
    {
        $idCurso = $this->uri->segment(3, 0);
        $idDisciplina = $this->uri->segment(4, 0);
        $this->curso_model->retirarDisciplina($idCurso, $idDisciplina);
        redirect('curso/gerenciamento/'.$idCurso);
    }

    public function filiacao() 
    {
        $this->load->model('disciplina_model');
        $dados["disciplinas"] = $this->disciplina_model->listAll();
        $this->load->view('curso/filiacao', $dados);
    }

    public function filiar()
    {
        $filiacao = new stdClass();
        $filiacao->idCurso = $this->uri->segment(3, 0);
        $filiacao->idDisciplina = $this->input->post('disciplina');
        $this->curso_model->filiar($filiacao);
        redirect('curso/gerenciamento/'.$filiacao->idCurso);
    }*/

}
?>