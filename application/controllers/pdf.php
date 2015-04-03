<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {
	
	public function __construct() {
        parent::__construct();
        $this->load->model('model_pdf', 'pdf');
    }
	
	
	public function exportarFpdf(){
		$data["usuario"] = $this->pdf->getUsuario();
        //$data["asignatura"] = $this->pdf->getAsignatura();
        $data["unidades"] = $this->pdf->getUnidades();
        //$data["contenidos"] = $this->pdf->getContenidos();
        //$data["sesion"] = $this->pdf->getSesion();

        $this->load->vars($data);
        $this->load->view("profesor/reporte-fpdf");	
	}
}