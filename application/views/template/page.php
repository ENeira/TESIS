<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">
  <link href="<?= base_url('css/bootstrap-theme.css') ?>" rel="stylesheet" media="screen">
	<link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet" media="screen">
  <link href="<?= base_url('css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('css/docs.css') ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.fancybox.css')?>" media="screen">



	<title>Sistema Syllabus</title>
</head>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
    <!--Logos-->
        <a href="http://www.uv.cl">
        <img src="<?= base_url('img/uvlogo.jpg')?>" style="position: static; top:50px; left:0px;"> 
        </a>
        <a href="http://www.informatica.uv.cl">
        <img style="float:right;" src="<?= base_url('img/logodecom.png')?>">
        </a>

<!-- BARRA NAVBAR -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Bienvenido <?= $this->session->userdata('correo');?></a>
        <!--<a class="brand" href="#" <?= $titulo ?>></a> -->
          <div class="nav-collapse collapse">
            <ul class="nav">
              	<?= menu_navbar(); ?>
                <li> <a href="http://www.uv.cl"> UV </a> </li>
                <li> <a href="http://www.Informatica.uv.cl"> Escuela ICI </a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<div class="container">	
  <div class="row">
    <div class="span3 bs-docs-sidebar">
    	<ul class="nav nav-list bs-docs-sidenav">
          <li><a>Bienvenido <?= $this->session->userdata('correo'); ?></a></li>
          <?= menu_var_administrador(); ?>
         
      </ul>
    </div>
    <div class="span9">
      <?= $this->load->view($contenido); ?>
  	</div>
  </div>
  <hr>
  
</div>
<div class="alert alert-success bs-alert-old-docs">
      <center><strong>&copy;</strong>Universidad de Valparaíso </center>
</div>
<!-- Footer
    ================================================== -->
    <footer class="footer">
      <div class="container">
        <p>Design based Codeigniter - bootstrap Twitter</p>
        <p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a></p>
        <p><a href="http://glyphicons.com">Glyphicons Free</a> licensed under</p>
       
        <ul class="footer-links">
          <li><a href="http://blog.getbootstrap.com">Blog</a></li>
          <li class="muted">&middot;</li>
          <li><a href="https://github.com/twbs/bootstrap/issues?state=open">Issues</a></li>
          <li class="muted">&middot;</li>
          <li><a href="https://github.com/twbs/bootstrap/releases">Changelog</a></li>
        </ul>
      </div>
    </footer>


<!--
<script src="<?= base_url('dist/libs/jquery.js') ?>"></script>
<script src="<?= base_url('dist/jstree.min.js') ?>"></script>
<script src="<?= base_url('js/jquery.easyui.min.js') ?>"></script>
<script src="<?= base_url('js/joint.js') ?>"></script>
-->

<script src="<?= base_url('js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery-1.10.1.min.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.mousewheel-3.0.6.pack.js')?>"></script>
<script type="text/javascript" src="<?= base_url('js/jquery.fancybox.pack.js')?>"></script>

<script>
  $(document).ready(function() {
  $(".fancybox-button").fancybox({
    prevEffect    : 'none',
    nextEffect    : 'none',
    closeBtn    : false,
    helpers   : {
      title : { type : 'inside' },
      buttons : {}
    }
  });
});
</script>


<script>
$(function(){
      var formulario = $('#formulario'), ordenando = false, lista = $('#lista'),
                    elementos = lista.find('li');
      lista.sortable({
                update: function(event,ui){
                    var ordenPuntos = $(this).sortable('toArray').toString();
                    $.ajax({
                        type: 'POST',
                        url: 'controlador.php',
                        dataType: 'json',
                        data: {
                            accion: 'ordenar',
                            puntos: ordenPuntos
                        }
                    });
                }
            });
            lista.sortable('disable');
            $('input[name="editar-ordenar"]').on('change', function(){
                if ($(this).val() == 'ordenar'){
                    lista.sortable('enable');
                    elementos.attr('contenteditable',false);
                    ordenando = true;
                }
                else{
                    lista.sortable('disable');
                    elementos.attr('contenteditable',true);
                    ordenando = false;
                }
            });


      formulario.on('submit',function(evento){ //Cuando el formulario se envía, vamos a insertar
        evento.preventDefault();
        var nombre = $('#campo-nombre').val();
        $('#campo-nombre').val('');
                $('<li>',{
                    'class': ordenando ? 'ordenable' : '',
                    text: nombre,
                    'contenteditable' : true
                }).hide().appendTo($('#lista')).fadeIn('slow');
            });
            lista.on('keydown', 'li', function(evento){
                var punto = $(this);
                var idPunto = punto.attr('id').split('-');
                idPunto = idPunto[1];

                switch(evento.keyCode){
                    case 27:{ //Escape
                        document.execCommand('undo');
                        punto.blur();
                        break;
                    }
                    case 46:{ //Suprimir
                        if (confirm('¿Seguro que quiere eliminar este elemento?')){
                            punto.fadeOut('slow').remove();
                        }
                        break;
                    }
                    case 13:{ //Enter
                        evento.preventDefault();
                        var texto = punto.text();
                        punto.blur();
                        break;
                    }
                }
            });
    });
  </script>

</body>
</html>