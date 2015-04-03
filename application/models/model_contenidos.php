<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_contenidos extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('contenidos');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('contenidos')->row();
    }

    function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('contenidos');
    }

    function update($registro) {

        $var1 = array('nombre' => $registro['nombre'] );
        $var2 = array('numeroc' => $registro['numeroc'] );
        $var3 = array('descripcion' => $registro['descripcion'] );
        $this->db->set($var1);
        $this->db->set($var2);
        $this->db->set($var3);
        $this->db->where('id', $registro['id']);
        $this->db->update('contenidos');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('contenidos');
    } 
}