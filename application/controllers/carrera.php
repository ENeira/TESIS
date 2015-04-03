<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrera extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->library('pagination');
		$this->load->model('model_carrera');
		$this->form_validation->set_message('required','Debe ingresar un valor un valor para %s');
	}

//pagina de inicio para todo tipo de usuario 

	public function index()
	{
		//$config['base_url']='http://localhost:8888/Tesis/asignatura/index';
		//$config['total_rows'] = '20';
		//$config['per_page'] = '20';
		//$this->pagination->initialize($config);
		//echo $this->pagination->create_links();

		$data['contenido'] = 'carrera/index';
		$data['titulo'] = 'Carrera';
		$data['query'] = $this->model_carrera->all();
		$this->load->view('template/page', $data);
	}

	public function edit($id){
		//$id = $this->uri->segment(3);

		$data['contenido'] = 'carrera/edit';
		$data['titulo'] = 'Crear Syllabus';
		$data['registro'] = $this->model_carrera->find($id);
		$this->load->view('template/page', $data);
	}
	public function update(){
		$registro = $this->input->post();
		$this->model_carrera->update($registro);
		redirect('carrera/index');

		//update($registro);

	}
}

