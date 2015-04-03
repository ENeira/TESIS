<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




if ( ! function_exists('my_validation_errors'))
{
	function my_validation_errors($errors)
	{
		$salida= '';
		if($errors){
			$salida = '<div class="alert alert-error">';
			$salida = $salida.'<button href="#" type="button" class="close" data-dismiss="alert"> x </button>';
			$salida = $salida.'<h4>Mensaje de Validación </h4>';
			$salida = $salida.'<small>'.$errors.'</small>';
			$salida = $salida.'</div>';
		}

		return $salida;
	}
}




// menu navbar superior.

if ( ! function_exists('menu_navbar'))
{
	function menu_navbar(){
		$opcion = '<li>'.anchor('/home/salir','Salir').'</li>';
		return $opcion;
	}
}





// menu para todos 
if ( ! function_exists('menu_var_administrador'))
{
	function menu_var_administrador(){

		if(get_instance()->session->userdata('correo') && get_instance()->session->userdata('tipo_usuario')=='Administrador')
		{
			//Creacion menu inicial
			$opcion = $opcion = '<li>'.anchor('/home/bienvenida','Inicio').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/gestion_usuario','Gestión de Usuarios').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/gestion_carrera','Gestión de Carrera').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/gestion_asignatura','Gestion de Asignaturas').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/ver_todos','Ver Syllabus Existentes').'</li>';
		}

		else if(get_instance()->session->userdata('correo') && get_instance()->session->userdata('tipo_usuario')=='Profesor')
		{	
			$opcion = '<li>'.anchor('/home/bienvenida','Inicio').'</li>';
			$opcion = $opcion.'<li>'.anchor('/asignatura/index','Crear Syllabus').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/ver_syllabus','Ver Syllabus').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/exportar_syllabus','Exportar Syllabus').'</li>';
			$opcion = $opcion.'<li>'.anchor('/home/salir','Salir').'</li>';
		}	
		else  
		{
			$opcion = '<li>'.anchor('/home','Inicio').'</li>';
		}	
	 return $opcion;
	}
}






