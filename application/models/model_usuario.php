<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_usuario extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function get_login($user, $pass){
		$this->db->where('correo', $user);
		$this->db->where('pass', $pass);
		return $this->db->get('Ingreso');
	}

}
