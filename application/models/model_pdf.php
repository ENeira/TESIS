<?php

class Model_pdf extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsuario() {       	   
        $this->db->select('*');
        $q = $this->db->get('usuario');
        return $q->result();
        $q->free_result();
    }
   public function getAsignatura(){
        $this->db->select('*');
        $q = $this->db->get('asignatura');
        return $q->result();
        $q->free_result();
    }
    public function getContenidos(){
        $this->db->select('*');
        $q = $this->db->get('contenidos');
        return $q->result();
        $q->free_result(); 
    }
    public function getUnidades(){
        $this->db->select('*');
        $q = $this->db->get('unidades');
        return $q->result();
        $q->free_result(); 
    }
    public function getSesion(){
        $this->db->select('*');
        $q = $this->db->get('sesion');
        return $q->result();
        $q->free_result(); 
    }

}

?>