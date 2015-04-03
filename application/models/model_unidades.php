<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_unidades extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('unidades');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('unidades')->row();
    }

    function insert($registro) {
    	$this->db->set($registro);
		$this->db->insert('unidades');
    }

    function update($registro) {

        $var1 = array('nombre' => $registro['nombre'] );
        $var2 = array('numero' => $registro['numero'] );
        $var3 = array('descripcion' => $registro['descripcion'] );

    	$this->db->set($var1);
        $this->db->set($var2);
		$this->db->set($var3);

        $this->db->where('id', $registro['id']);
		$this->db->update('unidades');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('unidades');
    } 
}