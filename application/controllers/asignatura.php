<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Asignatura extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->library('pagination');
		$this->load->model('model_asignatura');
		$this->form_validation->set_message('required','Debe ingresar un valor un valor para %s');
	}

//pagina de inicio para todo tipo de usuario 

	public function index()
	{
		//$config['base_url']='http://localhost:8888/Tesis/asignatura/index';
		//$config['total_rows'] = '20';
		//$config['per_page'] = '20';
		//$this->pagination->initialize($config);


		$data['contenido'] = 'asignatura/index';
		$data['titulo'] = 'Asignatura';
		$data['query'] = $this->model_asignatura->all();
		$this->load->view('template/page', $data);
	}

	public function edit($id){
		//$id = $this->uri->segment(3);

		$data['contenido'] = 'asignatura/edit';
		$data['titulo'] = 'Crear Syllabus';
		$data['registro'] = $this->model_asignatura->find($id);
		$this->load->view('template/page', $data);
	}
	public function update(){
		$registro = $this->input->post();
		$this->model_asignatura->update($registro);
		redirect('asignatura/index');

		//update($registro);

	}
}

