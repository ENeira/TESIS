<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->library('usuariolib'); 
		
		$this->load->model('model_asignatura');
		$this->load->model('model_unidades');
		$this->load->model('model_contenidos');
		$this->load->model('model_bibliografia');
		$this->load->model('model_usuario');
		$this->load->model('model_insertdescripcion');
		$this->load->model('model_sesion');
		$this->load->model('model_taxonomiabloom');
		$this->load->model('model_metodos');
		$this->load->model('model_evaluacion');
		$this->load->model('model_carrera');

		$this->form_validation->set_message('required','Debe ingresar un valor un valor para %s');
		$this->form_validation->set_message('loginok','Usuario y/o Clave incorrectos');
		$this->form_validation->set_message('valid_email','El campo %s debe ser un email correcto');
	}

//pagina de inicio para todo tipo de usuario 

	public function index()
	{
		$data['contenido'] = '/home/inicio';
		$data['titulo'] = 'Inicio';
		//$data = array[ 'contenido' => '']; es lo mismo que el array anterior
		$this->load->view('template/page', $data);
	}

	public function inicio()
	{
		$data['contenido'] = '/home/index';
		$data['titulo'] = 'Inicio';
		//$data = array[ 'contenido' => '']; es lo mismo que el array anterior
		$this->load->view('template/page', $data);
	}

// opcion para mostrar informacion del proyecto de tesis. 

	public function acerca_de()
	{
		// variable de session (clave - valor)
		
		$data['contenido'] = '/home/acerca_de';
		$data['titulo'] = 'Acerca_de';
		$this->load->view('template/page', $data);
	}

// denegart el acceso a las paginas sino esta logeado

	public function acceso_denegado()
	{
		$data['contenido'] = '/home/acceso_denegado';
		$data['titulo'] = 'Denegado';
		$this->load->view('template/page', $data);

	}














// funcion para saber si el login esta ok en la base de datos comprobacion

	public function loginok(){
		$usuario = $this->input->post('login');
		$password = $this->input->post('password');
		//$tipousuario = $this->input->post('TipoUsuario');
			
		return $this->usuariolib->login($usuario, $password);

	}

// funciones para iniciar sesion 

	public function ingresar(){

			$usuario = $this->input->post('login');
			$password = $this->input->post('password');
			//$tipousuario = $this->input->post('TipoUsuario');

			
		// validaciones de formulario 
		$this->form_validation->set_rules('login', 'usuario', 'required||valid_email|trim|callback_loginok');
		$this->form_validation->set_rules('password', 'clave', 'required');


			if($this->form_validation->run() == FALSE){
					$this->inicio();
			}
			else{
				redirect('/home/bienvenida');
			}

	}






// update del perfil de la carrera 
public function updatecarrera(){
		 $result = $this->input->post();	
		 $pk = $this->session->userdata('carrera');;

		 $this->form_validation->set_rules('perfil_egreso', 'perfil_egreso', 'required');
		 $this->form_validation->set_rules('mision', 'mision', 'required');
		 $this->form_validation->set_rules('vision', 'vision', 'required');


		if ($this->form_validation->run() == FALSE) {
			redirect('/home/gestion_carrera');
		}
		else{

			$this->model_carrera->update($result, $pk);
		    redirect('/home/info_unidades');
		}

	}

















//pagina de bienvenida para todos los usuarios del sistema

	public function bienvenida(){
		$data['contenido'] = '/template/bienvenida'; // /carrera/index
		$data['titulo'] = 'Terapeuta';
		$this->load->view('template/page', $data);

	}

//matar la sesion de usuario. 
	public function salir(){
		$this->session->sess_destroy();
		redirect('home/index');
	}

//crear cuenta por parte del administrador

//	public function norepnom(){
//		return $this->usuariolib->norepnom($this->input->post());
//	}
//
//	public function noreprut(){
//		return $this->usuariolib->noreprut($this->input->post());
//	}


	public function gestion_usuario(){
		$data['contenido'] = '/administrador/gestion_usuario';
		$data['titulo'] = 'Gestion Usuario';
		$this->load->view('template/page', $data);
	}
	
	public function insertusuario(){

		$user['id'] = $this->input->post('id');
		$user['usuario'] = $this->input->post('usuario');
		$user['rut'] = $this->input->post('rut');
		$user['telefono'] = $this->input->post('telefono');
		$user['pass'] = $this->input->post('pass');
		$user['mail'] = $this->input->post('mail');
		$user['tipousuario'] = $this->input->post('tipousuario');	
		$this->model_usuario->insert($user);
		redirect('/home/gestion_usuario');
	}
	public function edituser($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] = 'home/edituser';
		$data['titulo'] = 'Editar Usuario';
		$data['result'] = $this->model_usuario->find($id);
		$this->load->view('template/page', $data);
	}
	public function update(){
		$result = $this->input->post();	
		$this->form_validation->set_rules('usuario', 'Nombre', 'required');
		$this->form_validation->set_rules('rut', 'Rut', 'required|callback_isok');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required');
		$this->form_validation->set_rules('mail', 'Mail', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->edituser($result['id']);
		}
		else{
			$this->model_usuario->update($result);
		    redirect('/home/gestion_usuario');
		}
	}
	public function delateuser($id){
		$data['contenido'] = 'home/delateuser';
		$data['titulo'] = 'Eliminar Usuario';
		$data['result'] = $this->model_usuario->find($id);
		$this->load->view('template/page', $data);
	}
	public function delete($id){
		$this->model_usuario->delete($id);
		redirect('/home/gestion_usuario');
	}

	public function gestion_carrera(){
		$data['contenido'] = '/administrador/gestion_carrera';
		$data['titulo'] = 'Gestion Carrera';
		$this->load->view('template/page', $data);
	}
	
	public function gestion_asignatura(){
		$data['contenido'] = '/administrador/gestion_asignatura';
		$data['titulo'] = 'Gestion Asignatura';
		$this->load->view('template/page', $data);
	}
	
	public function ver_todos(){
		$data['contenido'] = '/administrador/ver_todos';
		$data['titulo'] = 'Ver Todos';
		$data['query'] = $this->model_asignatura->all();
		$this->load->view('template/page', $data);
	}
//Panel para Profesor

	public function crear_syllabus(){
		$data['contenido'] = '/views/asignatura/index';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}

//vistas del crear syllabus interior

	public function info_asignatura(){
		$data['contenido'] = '/profesor/info_asignatura';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
	
//insertar en la bd la informacion de info_asignatura (ok)
	public function insertdescripcion(){

		$desc['id'] = $this->input->post('id');
		$desc['descripcion_asig'] = $this->input->post('descripcion_asig');
		$desc['contribucion_asig'] = $this->input->post('contribucion_asig');
		$desc['introduccion'] = $this->input->post('introduccion');

		$this->model_insertdescripcion->insert($desc);
		redirect('/home/info_unidades');	
	}

	public function info_unidades(){
		$data['contenido'] = '/profesor/info_unidades';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
//Crud Unidad - info_unidad
	public function insertunidad(){
	//	$unidad['id'] = $this->input->post('unidad');
		$unidad['numero'] = $this->input->post('numero');
		$unidad['nombre'] = $this->input->post('nombre');
		$unidad['descripcion'] = $this->input->post('descripcion');
		$unidad['syllabus_id'] = $this->input->post('syla');

		$this->model_unidades->insert($unidad);
		redirect('/home/info_unidades');
	}
	
	public function editunidad($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] = 'home/editunidad';
		$data['titulo'] = 'Editar Unidad';
		$data['result'] = $this->model_unidades->find($id);
		$this->load->view('template/page', $data);
	}
	public function updateuni(){
		 $result = $this->input->post();	
		 $this->form_validation->set_rules('id', 'Id Unidad', 'required');
		 $this->form_validation->set_rules('numero', 'Numero Unidad', 'required');
		 $this->form_validation->set_rules('nombre', 'Nombre Unidad', 'required');
		 $this->form_validation->set_rules('descripcion','Descripción Unidad','required');

		if ($this->form_validation->run() == FALSE) {
			$this->editunidad($result['id']);
		}
		else{

			$this->model_unidades->update($result);
		    redirect('/home/info_unidades');
		}
	}
	public function delateunidad($id){
		$data['contenido'] = 'home/delateunidad';
		$data['titulo'] = 'Eliminar Unidad';
		$data['result'] = $this->model_unidades->find($id);
		$this->load->view('template/page', $data);
	}
	public function deleteuni($id){
		$this->model_unidades->delete($id);
		redirect('/home/info_unidades');
	}
//

	public function info_contenidos(){
		$data['contenido'] = '/profesor/info_contenidos';
		$data['titulo'] = 'Profesor';
		//$data['resutl'] = $this->model_unidades->find($id);
		$this->load->view('template/page', $data);
	}
//Crud Contenidos
	public function insertcontenido(){
		
		$contenido['nombre'] = $this->input->post('nombre');
		$contenido['numeroc'] = $this->input->post('numeroc');
		$contenido['descripcion'] = $this->input->post('descripcion');
		$contenido['unidades_id'] = $this->input->post('mensajeuni');

		$this->model_contenidos->insert($contenido);
		redirect('/home/info_contenidos');
	}
	
	public function editcontenido($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] = 'home/editcontenido';
		$data['titulo'] = 'Editar contenido';
		$data['result'] = $this->model_contenidos->find($id);
		$this->load->view('template/page', $data);
	}
	public function updatecont(){
		$result = $this->input->post();
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('nombre', 'Nombre Contenido', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
		$this->form_validation->set_rules('numeroc', 'Numero Contenido', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->editcontenido($result['id']);
		}
		else{
			$this->model_contenidos->update($result);
		    redirect('/home/info_contenidos');
		}
	}
	public function delatecontenido($id){
		$data['contenido'] = 'home/delatecontenido';
		$data['titulo'] = 'Eliminar Contenidos';
		$data['result'] = $this->model_contenidos->find($id);
		$this->load->view('template/page', $data);
	}
	public function deletecont($id){
		$this->model_contenidos->delete($id);
		redirect('/home/info_contenidos');
	}
//
//CURD SESIONES Y VERBOS
	public function info_sesiones(){
		$data['contenido'] = '/profesor/info_sesiones';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
	public function insertsesion(){
		$sesion['numeros'] 		= $this->input->post('numeros');
		$sesion['verbo'] 		= $this->input->post('verbo');
		$sesion['descripcion1'] = $this->input->post('descripcion1');
		$sesion['metodo'] 		= $this->input->post('metodo');
		$sesion['descripcion2'] = $this->input->post('descripcion2');
		$sesion['unidades_id'] = $this->input->post('mensajeuni');
		$sesion['nombre'] = $this->input->post('nombre');

		$this->model_sesion->insert($sesion);
		redirect('/home/info_sesiones');		
	}
	public function editsesion($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] 	= 'home/editsesion';
		$data['titulo'] 	= 'Editar Sesion';
		$data['result'] 	= $this->model_sesion->find($id);
		$this->load->view('template/page', $data);
	}
	public function updatesesion(){
		$result = $this->input->post();
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('nombre','Nombre Sesion', 'required');
		$this->form_validation->set_rules('numeros','Identificador Sesion', 'required');
		$this->form_validation->set_rules('verbo', 'Verbo', 'required');
		$this->form_validation->set_rules('descripcion1', 'Descripcion Verbo', 'required');
		$this->form_validation->set_rules('metodo', 'Metodo', 'required');
		$this->form_validation->set_rules('descripcion2', 'Descripcion Metodo', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->editsesion($result['id']);
		}
		else{
			$this->model_sesion->update($result);
		    redirect('/home/info_sesiones');
		}
	}
	public function delatesesion($id){
		$data['contenido'] 	= 'home/delatesesion';
		$data['titulo'] 	= 'Eliminar Sesion';
		$data['result'] 	= $this->model_sesion->find($id);
		$this->load->view('template/page', $data);
	}
	public function deletesesion($id){
		$this->model_sesion->delete($id);
		redirect('/home/info_sesiones');
	}
	public function info_evaluaciones(){
		$data['contenido'] = '/profesor/info_evaluaciones';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
	public function insertevaluacion(){
		$data['descripcion'] = $this->input->post('descripcion');
		$data['syllabus_id'] = $this->input->post('syla');
		$data['id'] = $this->input->post('id');
		$data['tipoevaluacion_id'] = $this->input->post('tipoevaluacion_id');	

		$this->model_evaluacion->insert($data);
		redirect('/home/info_evaluaciones');
	}
	public function editevaluacion($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] 	= 'home/editevaluacion';
		$data['titulo'] 	= 'Editar Evaluacion';
		$data['result'] 	= $this->model_evaluacion->find($id);
		$this->load->view('template/page', $data);
	}
	public function updateevaluacion(){
		$result = $this->input->post();
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->editevaluacion($result['id']);
		}
		else{
			$this->model_evaluacion->update($result);
		    redirect('/home/info_evaluaciones');
		}
	}
	public function delateevaluacion($id){
		$data['contenido'] 	= 'home/delateevaluacion';
		$data['titulo'] 	= 'Eliminar Evaluacion';
		$data['result'] 	= $this->model_evaluacion->find($id);
		$this->load->view('template/page', $data);
	}
	public function deleteevaluacion($id){
		$this->model_evaluacion->delete($id);
		redirect('/home/info_evaluaciones');
	}

	public function info_bibliografia(){
		$data['contenido'] = '/profesor/info_bibliografia';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
	public function insertbibliografia(){
		
		$biblio['id'] = $this->input->post('bibliografia');
		$biblio['titulo'] = $this->input->post('titulo');
		$biblio['autor'] = $this->input->post('autor');
		$biblio['editorial'] = $this->input->post('editorial');
		$biblio['tipo'] = $this->input->post('tipo');
		$biblio['ano'] = $this->input->post('ano');
		$biblio['edicion'] = $this->input->post('edicion');
		
		$biblio['syllabus_id'] = $this->input->post('syla');
		
		$this->model_bibliografia->insert($biblio);
		redirect('/home/info_bibliografia');
	}
	public function editbibliografia($id){
		//$id = $this->uri->segment(3);	
		$data['contenido'] 	= 'home/editbibliografia';
		$data['titulo'] 	= 'Editar Bibliografia';
		$data['result'] 	= $this->model_bibliografia->find($id);
		$this->load->view('template/page', $data);
	}
	public function updatebibliografia(){
		$result = $this->input->post();
		
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('titulo','Titulo','required');
		$this->form_validation->set_rules('autor','Autor','required');
		$this->form_validation->set_rules('editorial','Editorial','required');
		$this->form_validation->set_rules('tipo','Tipo','required');
		$this->form_validation->set_rules('ano','Año','required');
		$this->form_validation->set_rules('edicion','Edicion','required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->editbibliografia($result['id']);
		}
		else{
			$this->model_bibliografia->update($result);
		    redirect('/home/info_bibliografia');
		}
	}
	public function delatebibliografia($id){
		$data['contenido'] 	= 'home/delatebibliografia';
		$data['titulo'] 	= 'Eliminar Bibliografia';
		$data['result'] 	= $this->model_bibliografia->find($id);
		$this->load->view('template/page', $data);
	}
	public function deletebibliografia($id){
		$this->model_bibliografia->delete($id);
		redirect('/home/info_bibliografia');
	}


	public function ver_syllabus(){
		$data['contenido'] = '/profesor/ver_syllabus';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}
	public function exportar_syllabus(){
		$data['contenido'] = '/profesor/exportar_syllabus';
		$data['titulo'] = 'Profesor';
		$this->load->view('template/page', $data);
	}

	public function taxonomiabloom(){
	
		$data['contenido'] 	= 'home/taxonomiabloom';
		$data['titulo'] 	= 'Taxonomia de Bloom';
		$data['result'] 	= $this->model_taxonomiabloom->all();
		$this->load->view('profesor/taxonomiabloom', $data);
	}
	public function metodos(){
	
		$data['contenido'] 	= 'home/metodos';
		$data['titulo'] 	= 'Metodos';
		$data['result'] 	= $this->model_metodos->all();
		$this->load->view('profesor/metodos', $data);
	}

}
