<?php

//include("../../libraries/tcpdf/font/times.php"); //fpdf
$this->load->library('fpdf'); //fpdf

$nombre="";
$fpdf = new FPDF();

ob_end_clean();
//inicializa pagina pdf
$fpdf->Open();
$fpdf->AddPage();

//Cabecera
$fpdf->SetFont('Arial', '', 17);
$fpdf->SetTextColor("10", "1", "8"); //rojo    Cambiar Color 
//$fpdf->Image(base_url() . 'img/User.png', 10, 10, -100);
$fpdf -> Image( "img/uvlogo.jpg" , 10 , 10 , 40 , 20);
$fpdf -> Image("img/logodecom.png", 160, 5, 40, 10);
$fpdf -> SetFont ( 'Arial' , 'B' , 12 );
$fpdf -> Ln( 30 );

$fpdf->SetFontSize(17);
$fpdf->Cell(0, 6, 'Syllabus', 0, 1, 'C');
$fpdf->Ln();
$fpdf->Ln();
$fpdf->Ln();
$fpdf->SetFont('Arial', '', 10); //Tamaño letra del texto completo

//Consulta 1. Trae ID de la Sigla de la Carrera.
/*
$consulta1 = mysql_query("SELECT id FROM carrera");
//$consulta4 = mysql_query("SELECT id,sigla FROM asignatura WHERE id ='1' ");

while ( $datos = mysql_fetch_array($consulta1)) {
    
    $id = $datos ['id'];
 
    $fpdf -> Cell(60, 5, "ID ", 0, 0, 'C', 0);
    //$fpdf -> Cell(60, 5, "Sigla Asignatura", 0, 0, 'C', 0);
    $fpdf -> Ln(6);
    $fpdf -> SetFillColor( 400 );
    $fpdf -> Cell( 60, 10 , $id , 1, 0, 'C' , true );
    //$fpdf -> Cell( 60, 10 , 'id2' , 1, 0, 'C' , true );
    
}
*/

// Datos Iniciales.

$consulta2 = mysql_query( "SELECT sigla,nombre,hcxsemestre,haxsemana,hlxsemana,carrera_id  FROM asignatura WHERE sigla = 'INC 100' ");

while ( $datos = mysql_fetch_array( $consulta2 ) )
{
    $id1 = $datos ['carrera_id'];
    $id2 = $datos ['sigla'];
    $id3 = $datos ['nombre'];
    $id4 = $datos ['hcxsemestre'];
    $id5 = $datos ['haxsemana'];
    $id6 = $datos ['hlxsemana'];
    
    $fpdf -> Cell(60, 5, "ID ", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, "Sigla Asignatura", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, "Asignatura", 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 60, 10 , $id1, 1, 0, 'C' , true );
    $fpdf -> Cell( 60, 10 , $id2, 1, 0, 'C', true);
    $fpdf -> Cell( 60, 10 , $id3, 1, 0, 'C', true);
    //Segunda Barra
    $fpdf -> Ln( 20 );
    $fpdf -> Cell(60, 5, "Horas por semestre ", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, "Horas Ayudantias por semana", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, "Horas Laboratorios por semana", 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 60, 10 , $id4, 1, 0, 'C' , true );
    $fpdf -> Cell( 60, 10 , $id5, 1, 0, 'C', true);
    $fpdf -> Cell( 60, 10 , $id6, 1, 0, 'C', true);
}

//Descripcion de la Asignatura y Contribucion de la asignatura

$consulta3 = mysql_query("SELECT descripcion_asig,contribucion_asig,introduccion,asignatura_id FROM descasignatura WHERE asignatura_id = '1' ");

while ( $datos = mysql_fetch_array($consulta3)) {
    
    $id7 = $datos ['descripcion_asig'];
    $id8 = $datos ['contribucion_asig'];
    

    $fpdf -> Ln(20);
    $fpdf -> Cell(180, 5, "Descripcion de la Asignatura ", 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 50 , utf8_decode(ucwords($id7)), 1, 0, 'I' , true );
}
    $fpdf -> Ln(60);

//Red de Aprendizaje

$consulta4 = mysql_query("SELECT sigla,prerequisito,corequisito,area_ensenanza,ano_malla,semestre_malla  FROM asignatura WHERE sigla = 'INC 100' ");

while ( $datos = mysql_fetch_array($consulta4)) {
    
    $id10 = $datos ['prerequisito'];
    $id11 = $datos ['corequisito'];
    $id12 = $datos ['area_ensenanza'];
    $id13 = $datos ['ano_malla'];
    $id14 = $datos ['semestre_malla'];

    $fpdf -> Cell(60, 5, "Red de Aprendizaje", 0, 0, 'I', 0);
    $fpdf -> Ln(10);
    $fpdf -> Cell(40, 5, "Prerrequisitos ", 0, 0, 'C', 0);
    $fpdf -> Cell(100, 5, "Corequisito", 0, 0, 'C', 0);
    $fpdf -> Cell(40, 5, utf8_decode(ucwords("Área de Enseñanza")), 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 40, 10 , $id11, 1, 0, 'C' , true );
    $fpdf -> Cell( 100, 10 , $id10, 1, 0, 'C', true);
    $fpdf -> Cell( 40, 10 , utf8_decode(ucwords($id12)), 1, 0, 'C', true);
    $fpdf -> Ln(15);
    $fpdf -> Cell(90, 5, utf8_decode(ucwords('Año Malla Curricular')), 0, 0, 'C', 0);
    $fpdf -> Cell(90, 5, "Semestre Malla Curricular", 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 90, 10 , $id13, 1, 0, 'C' , true );
    $fpdf -> Cell( 90, 10 , $id14, 1, 0, 'C', true);

}

    $fpdf -> Ln(60);

//Introduccion

$consulta5 = mysql_query("SELECT introduccion,asignatura_id FROM descasignatura WHERE asignatura_id = '1' ");

while ( $datos = mysql_fetch_array($consulta5)) {
    
    $id9 = $datos ['introduccion'];

    $fpdf -> Ln(20);
    $fpdf -> Cell(180, 5, "Introduccion ", 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 50 , utf8_decode(ucwords($id9)), 1, 0, 'I' , true );
}
    $fpdf -> Ln(60);

//Unidades y Contenidos

$consulta6 = mysql_query("SELECT id,nombre,numero,syllabus_id FROM unidades WHERE syllabus_id = '1' ");



    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Unidades')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 90, 10 , 'Unidad', 1, 0, 'C' , true );
    $fpdf -> Cell( 90, 10 , 'Contenidos', 1, 0, 'C', true);
    //$fpdf -> Ln(10);
    //$fpdf -> Cell( 10, 10 , 'Indice', 1, 0, 'C' , true );
    //$fpdf -> Cell( 80, 10 , 'Nombre', 1, 0, 'C', true);
    //$fpdf -> Cell( 10, 10 , 'Indice', 1, 0, 'C' , true );
    //$fpdf -> Cell( 80, 10 , utf8_decode(ucwords('Nombre/Descripción')), 1, 0, 'C', true);

foreach ($unidades as $valor){
    
    $id = $valor->id;
    $nombre = $valor->nombre;
    $result=$id.$nombre;
    $fpdf -> Ln(10);
    $fpdf -> Cell( 90, 10 , $result, 1, 0, 'I' , true );
    //$fpdf -> Cell( 80, 10 , $nombre, 1, 0, 'C' , true );

}

$consulta7 = mysql_query("SELECT id,nombre,descripcion,numeroc,unidades_id FROM contenidos ");

while ( $datos = mysql_fetch_array($consulta7)) {
    
    $idc= $datos ['numeroc'];
    $nombre= $datos ['nombre'];
    $descripcion= $datos['descripcion'];
    $resultado=$idc.$nombre.$descripcion;

    $fpdf -> Cell(90,10, $resultado, 1, 0, 'C', true);
}
    $fpdf->Ln(40);

/*


    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Unidades')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 90, 10 , 'Unidad', 1, 0, 'C' , true );
    $fpdf -> Cell( 90, 10 , 'Contenidos', 1, 0, 'C', true);
    $fpdf -> Ln(10);
    $fpdf -> Cell( 10, 10 , 'Indice', 1, 0, 'C' , true );
    $fpdf -> Cell( 80, 10 , 'Nombre', 1, 0, 'C', true);
    
    $fpdf -> Cell( 10, 10 , 'Indice', 1, 0, 'C' , true );
    $fpdf -> Cell( 80, 10 , utf8_decode(ucwords('Nombre/Descripción')), 1, 0, 'C', true);
    $fpdf -> Ln(10);
    //Muestra de como deberia verse
    //indice 1
    $fpdf -> Cell( 10, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 80, 10 , 'uno', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 10, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 40, 10 , 'unoc', 1, 0, 'C' , true );
    // Descripcion
    $fpdf -> Cell( 40, 10 , 'desc1', 1, 0, 'C' , true );
    //siguiente linea
    $fpdf -> Ln(10);
    //indice
    $fpdf -> Cell( 10, 10 , '', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 80, 10 , 'dos', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 10, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 40, 10 , 'dosc', 1, 0, 'C' , true );
    //descripcion
    $fpdf -> Cell( 40, 10 , 'desc2', 1, 0, 'C' , true );
    //indice 2
    $fpdf -> Ln(10);
    $fpdf -> Cell( 13, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'uno', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'unoc', 1, 0, 'C' , true );
    // Descripcion
    $fpdf -> Cell( 39, 10 , 'desc1', 1, 0, 'C' , true );
    //siguiente linea
    $fpdf -> Ln(10);
    //indice
    $fpdf -> Cell( 13, 10 , '', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'dos', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'dosc', 1, 0, 'C' , true );
    //descripcion
    $fpdf -> Cell( 39, 10 , 'desc2', 1, 0, 'C' , true );
*/

    $fpdf ->Ln(10);


//Aqui va lo de las Seciones

    $fpdf -> Ln(23);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Sesiones')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 30, 10 , 'Unidad', 1, 0, 'C' , true );
    $fpdf -> Cell( 40, 10 , 'Sesion', 1, 0, 'C', true);
    $fpdf -> Cell( 55, 10 , 'Objetivo de Aprendizaje', 1, 0, 'C', true);
    $fpdf -> Cell( 55, 10 , 'Metodologias', 1, 0, 'C', true);
    $fpdf-> Ln(10);

$consultau= mysql_query("SELECT id,nombre FROM unidades");

while( $datos = mysql_fetch_array($consultau)){
    $unid= $datos ['id'];
    $nombreu= $datos['nombre'];
    $result= $unid.$nombreu;
    $fpdf->Cell(30,10,utf8_decode(ucwords($result)), 1, 2, 'I', true);
}
$consultas= mysql_query("SELECT id,nombre,numeros,verbo,descripcion1,metodo,descripcion2 FROM sesion");
while ($datos = mysql_fetch_array($consultas)) {
    $numeros= $datos['id'];
    $nombre= $datos['nombre'];
    $sesion= $numeros.$nombre;
    
    $obj= $datos['verbo'];
    $apr= $datos['descripcion1'];
    $objapren=$obj.$apr;

    $met= $datos ['metodo'];
    $des= $datos ['descripcion2'];
    $metodologia=$met.$des;
    
    $fpdf->Cell(30,10,utf8_decode(ucwords($sesion)), 1, 0, 'I', true);
    $fpdf->Cell(30,10,utf8_decode(ucwords($objapren)), 1,0, 'I', true);
    $fpdf->Cell(30,10,utf8_decode(ucwords($metodologia)), 1, 0, 'I', true);


}





    $fpdf -> Ln(15);
//Aqui va las Evaluaciones

$consulta8 = mysql_query("SELECT descripcion,id FROM evaluacion ");

while ( $datos = mysql_fetch_array($consulta8)) {
    
    $id15 = $datos ['descripcion'];

    $fpdf -> Ln(20);
    $fpdf -> Cell(180, 5, "Evaluaciones ", 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 50 , utf8_decode(ucwords($id15)), 1, 0, 'I' , true );

}

    $fpdf -> Ln(40);
//Aqui va las Bibliografia

$consulta9 = mysql_query("SELECT titulo,autor,editorial,tipo,ano,edicion FROM Bibliografia WHERE id = '1' ");

while ( $datos = mysql_fetch_array($consulta9)) {
    
    $id16 = $datos ['titulo'];
    $id17 = $datos ['autor'];
    $id18 = $datos ['editorial'];
    $id19 = $datos ['tipo'];
    $id20 = $datos ['ano'];
    $id21 = $datos ['edicion'];


    $fpdf -> Ln(20);
    $fpdf -> Cell(180, 5, "Bibliografia ", 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 50 , $id16, 1, 0, 'I' , true );
}




//finaliza y muestra en pantalla pdf
$fpdf->Output($nombre.".pdf","I");
//$fpdf->Output($informacion.".pdf", "I");
?>

























































































































































































/*   
    //Tercera Barra
    $fpdf -> Ln(20);
    $fpdf -> Cell(180, 5, "Descripcion de la Asignatura ", 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 100 , 'Lorem.......', 1, 0, 'I' , true );
    //Cuarta Barra
    $fpdf -> Ln( 110 );
    $fpdf -> Cell(60, 5, "Red de Aprendizaje", 0, 0, 'I', 0);
    $fpdf -> Ln(10);
    $fpdf -> Cell(60, 5, "Prerrequisitos ", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, "Corequisito", 0, 0, 'C', 0);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords("Área de Enseñanza")), 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 60, 10 , 'Prerrequisitos', 1, 0, 'C' , true );
    $fpdf -> Cell( 60, 10 , 'Corequisito', 1, 0, 'C', true);
    $fpdf -> Cell( 60, 10 , utf8_decode(ucwords('Area Enseñanza')), 1, 0, 'C', true);
    //Quinta Barra
    $fpdf -> Ln(15);
    $fpdf -> Cell(90, 5, utf8_decode(ucwords('Año Malla Curricular')), 0, 0, 'C', 0);
    $fpdf -> Cell(90, 5, "Semestre Malla Curricular", 0, 0, 'C', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 90, 10 , '1', 1, 0, 'C' , true );
    $fpdf -> Cell( 90, 10 , '1', 1, 0, 'C', true);
    // Secta Barra
    $fpdf -> Ln(20);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Introducción')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> SetFillColor( 400 );                   // 0=negro 400=blanco
    $fpdf -> Cell( 180, 20 , 'Lorem.......', 1, 0, 'I' , true );
    //Septima Barra
    $fpdf -> Ln(23);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Unidades')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 90, 10 , 'Unidades', 1, 0, 'C' , true );
    $fpdf -> Cell( 90, 10 , 'Contenidos', 1, 0, 'C', true);
    $fpdf -> Ln(10);
    $fpdf -> Cell( 13, 10 , 'Indice', 1, 0, 'C' , true );
    $fpdf -> Cell( 77, 10 , 'Nombre', 1, 0, 'C', true);
    $fpdf -> Cell( 13, 10 , 'Indice', 1, 0, 'C' , true );
    $fpdf -> Cell( 38, 10 , 'Nombre', 1, 0, 'C', true);
    $fpdf -> Cell( 39, 10 , utf8_decode(ucwords('Descripcion')), 1, 0, 'C' , true ); 
    $fpdf -> Ln(10);
    //Muestra de como deberia verse
    //indice 1
    $fpdf -> Cell( 13, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'uno', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'unoc', 1, 0, 'C' , true );
    // Descripcion
    $fpdf -> Cell( 39, 10 , 'desc1', 1, 0, 'C' , true );
    //siguiente linea
    $fpdf -> Ln(10);
    //indice
    $fpdf -> Cell( 13, 10 , '', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'dos', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'dosc', 1, 0, 'C' , true );
    //descripcion
    $fpdf -> Cell( 39, 10 , 'desc2', 1, 0, 'C' , true );
    //indice 2
    $fpdf -> Ln(10);
    $fpdf -> Cell( 13, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'uno', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '1', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'unoc', 1, 0, 'C' , true );
    // Descripcion
    $fpdf -> Cell( 39, 10 , 'desc1', 1, 0, 'C' , true );
    //siguiente linea
    $fpdf -> Ln(10);
    //indice
    $fpdf -> Cell( 13, 10 , '', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 77, 10 , 'dos', 1, 0, 'C' , true );
    //Indice
    $fpdf -> Cell( 13, 10 , '2', 1, 0, 'C' , true );
    //Nombre
    $fpdf -> Cell( 38, 10 , 'dosc', 1, 0, 'C' , true );
    //descripcion
    $fpdf -> Cell( 39, 10 , 'desc2', 1, 0, 'C' , true );

// LA SECCION ANTERIOR SE REPITE HASTA QUE SE ACABEN LAS UNIDADES

    $fpdf -> Ln(23);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Sesiones')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 20, 20 , 'In.Unidad', 1, 0, 'C' , true );
    $fpdf -> Cell( 20, 20 , 'In.Sesion', 1, 0, 'C', true);
    $fpdf -> Cell( 40, 20 , 'Descripcion', 1, 0, 'C', true);
    
    $fpdf -> Cell( 50, 10 , 'Objetivo de Aprendizaje', 1, 2, 'C', true); 
    $fpdf -> Cell( 13, 10 , 'verbo', 1, 0, 'C', true);
    $fpdf -> Cell( 37, 10 , 'descripcion', 1, 0, 'C', true);

    $fpdf -> Cell( 50, 10 , 'Metodologias', 1, 2, 'C', true);
    $fpdf -> Cell( 13, 10 , 'verbo', 1, 0, 'C', true);
    $fpdf -> Cell( 37, 10 , 'descripcion', 1, 0, 'C', true);
    $fpdf -> Ln(10);
    


}
$consulta3 = mysql_query( "SELECT id FROM carrera ");
while ( $datos = mysql_fetch_array( $consulta3 ) )
{
   $id = $datos [ 'id' ];

    $fpdf -> Ln(40);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Evaluaciones')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 180, 40 , $id, 1, 0, 'I' , true );
    $fpdf -> Ln(50);
    $fpdf -> Cell(60, 5, utf8_decode(ucwords('Bibliografia')), 0, 0, 'I', 0);
    $fpdf -> Ln( 6 );
    $fpdf -> Cell( 180, 40 , 'Lorem......', 1, 0, 'I' , true );
}
*/

/*
foreach ($usuarios as $valor) {
    $nombre = $valor->nombres . " " . $valor->apellidos;
    
    $fpdf->SetTitle("Reporte: ".$nombre, true);
    $fpdf->SetFontSize(12);
    $fpdf->SetTextColor("85", "78", "78"); //gris
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Codigo: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5,  $valor->codigo, 0);
    //salto de linea
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Nombres y Apellidos: ", 0);
    $fpdf->SetFont('Arial', '', 12);    
    $fpdf->Cell(0, 5, utf8_decode(ucwords($nombre)), 0);
    //salto de linea
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Fecha Nacimiento: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5, $valor->telefono, 0);
    //salto de linea
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "EPS-Futbol club: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5, utf8_decode($valor->ciudad), 0);  
    $fpdf->Ln();
    $fpdf->Ln();
    $fpdf->PageNo();
}

foreach ($info as $valor){
    $informacion = $valor->info;

    $fpdf->SetTitle("Reporte: ".$informacion, true);
    $fpdf->SetFontSize(12);
    $fpdf->SetTextColor("85", "78", "78"); //gris
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "Codigo: ", 0);
    $fpdf->SetFont('Arial', '', 12);
    $fpdf->Cell(0, 5,  $valor->codigo, 0);
    //salto de linea
    $fpdf->Ln();
    $fpdf->SetFont('Arial', 'BI', 12);
    $fpdf->Cell(45, 5, "informacion: ", 0);
    $fpdf->SetFont('Arial', '', 12);    
    $fpdf->Cell(0, 5, utf8_decode(ucwords($informacion)), 0);
    $fpdf->Ln();
    $fpdf->PageNo();
}
$fpdf -> Ln( 30 );
*/

//$consulta1 = mysql_query( "SELECT sexo,info FROM info WHERE sexo = 'masculino' and info ='chile' ");
/*
$consulta1 = mysql_query( "SELECT sexo,info FROM info WHERE sexo = 'masculino' and info ='chile' ");

while ( $datos = mysql_fetch_array( $consulta1 ) )
{
    $carrera = $datos [ 'info' ];
    //$sexo = $datos [ 'sexo' ];
    //$materno = $datos [ 'materno' ];
    //$contra = $datos [ 'contra' ];
    //$pais = $datos [ 'pais' ];

    $fpdf -> SetFillColor( 100 , 100 , 200 );  
    
    $fpdf -> Cell( 40, 10 , $carrera, 1, 0, 'C' , true );
    //$fpdf -> Cell( 40, 10 , $sexo , 1, 0, 'C' , true );

    //$mipdf -> Cell( 40, 10 , $nombre , 1, 0, 'C' , true );
    //$mipdf -> Cell( 40, 10 , $paterno , 1, 0, 'C' , true );
    //$mipdf -> Cell( 40, 10 , $materno, 1, 0, 'C' , true );
    //$mipdf -> Cell( 40, 10 , $contra, 1, 0, 'C' , true );
    //$mipdf -> Cell( 40, 10 , $pais , 1, 0, 'C' , true );
    //$mipdf -> Ln( 10);   
}
$fpdf -> Ln( 100 );

*/