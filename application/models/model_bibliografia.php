<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_bibliografia extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('bibliografia');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('bibliografia')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('bibliografia');
    }

    function update($registro) {
    	$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('bibliografia');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('bibliografia');
    } 
}