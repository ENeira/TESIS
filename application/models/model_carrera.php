<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_carrera extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('carrera');
        return $query->result();
    }

    function find($id_carrera) {
    	$this->db->where('id_carrera', $id_carrera);
		return $this->db->get('carrera')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('carrera');
    }

    function update($registro, $pk) {
    	$this->db->set($registro);
		$this->db->where('id_carrera', $pk);
        $this->db->update('carrera');
    }

    function delete($id_carrera) {
    	$this->db->where('id_carrera', $id_carrera);
		$this->db->delete('carrera');
    }
    
}