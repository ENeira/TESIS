<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesor extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('model_profesor');
		$this->form_validation->set_message('required','Debe ingresar un valor un valor para %s');
	}

//pagina de inicio para todo tipo de usuario 

	public function info_asignatura()
	{
		$data['contenido'] = 'profesor/info_asignatura';
		$data['titulo'] = 'Profesor';
		$data['query'] = $this->model_profesor->all();
		$this->load->view('template/page', $data);
	}

	public function edit($id){
		//$id = $this->uri->segment(3);

		$data['contenido'] = 'asignatura/edit';
		$data['titulo'] = 'Informacion Asignatura';
		$data['registro'] = $this->model_profesor->find($id);
		$this->load->view('template/page', $data);
	}

	public function update(){
		$registro = $this->input->post();
		$this->model_profesor->update($registro);
		redirect('asignatura/index');

	}
}