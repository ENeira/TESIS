<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_usuario extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function get_login($user, $pass){
		$this->db->where('correo', $user);
		$this->db->where('pass', $pass);
		return $this->db->get('Ingreso');
	}

	function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('Ingreso');
    }
    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('Ingreso');
    } 
    function all() {
        $query = $this->db->get('Ingreso');
        return $query->result();
    }
    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('Ingreso')->row();
    }
    function update($registro){
    	$this->db->set($registro);
    	$this->db->where('id', $registro['id']);
    	$this->db->update('Ingreso');
    }
}
