<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_profesor extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('profesor');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('profesor')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('profesor');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('profesor');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('profesor');
    }
}