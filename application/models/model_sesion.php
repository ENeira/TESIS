<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// validacion para el modelo de usuario login cambio de clave CRUD
class model_sesion extends CI_Model{

	function __construct(){
		parent::__construct();	
	}

	function all() {
        $query = $this->db->get('sesion');
        return $query->result();
    }

    function find($id) {
    	$this->db->where('id', $id);
		return $this->db->get('sesion')->row();
    }

    function insert($registro) {
        $this->db->set($registro);
        $this->db->insert('sesion');
    }

    function update($registro) {

        $var1 = array('numeros' => $registro['numeros'] );
        $var2 = array('verbo' => $registro['verbo'] );
        $var3 = array('descripcion1' => $registro['descripcion1'] );
        $var4 = array('metodo' => $registro['metodo'] );
        $var5 = array('descripcion2' => $registro['descripcion2'] );
        $var6 = array('unidades_id' => $registro['unidades_id']); 
        $var7 = array('nombre' => $registro['nombre']); 

        $this->db->set($var1);
        $this->db->set($var2);
        $this->db->set($var3);
        $this->db->set($var4);
        $this->db->set($var5);
        $this->db->set($var6);
        $this->db->set($var7);

        $this->db->where('id', $registro['id']);
        $this->db->update('sesion');
    }

    function delete($id) {
    	$this->db->where('id', $id);
		$this->db->delete('sesion');
    } 
}