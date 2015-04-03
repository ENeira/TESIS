<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class usuariolib{

	function __construct()
	{
		$this->CI = & get_instance(); //instancias que carga de la libreria.
		$this->CI->load->model('model_usuario'); 
		
	}



	public function login ($user, $pass){
		$query = $this->CI->model_usuario->get_login($user,$pass);
		if($query->num_rows() > 0 ){
			$usuario = $query->row();
			$user = array ('correo' => $usuario->correo, 
							'pass' => $usuario->pass,
							'tipo_usuario' => $usuario->tipo_usuario,
							'carrera' => $usuario->carrera_id_carrera);
			$this->CI->session->set_userdata($user);
			return TRUE;
		}
		else {
			$this->CI->session->sess_destroy();
			return FALSE;
			}
	}


}