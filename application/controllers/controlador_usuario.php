<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controlador_usuario extends CI_Controller {
 
	function __construct(){
		parent::__construct();
	}


	public function index()
	{
		$data['contenido'] = '/home/inicio';
		$data['titulo'] = 'Inicio';
		$this->load->view('Templates/inicio', $data);
	}

}