<!DOCTYPE html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale-1.0">

  <link rel="stylesheet" href="<?= base_url('css/normalize.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('css/fonts.css') ?>" >
  <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>" >

	<title>Sistema Syllabus</title>

</head>

<body>

<!--  CREACION DEL HEADER -->
<div id="menu">
    <a id="marca" href=""></a>
    <h3>17367573-9 - Diozel Zepeda</h3>

    <!--<a id="carrera" href=""></a> -->
</div>

<!-- menu 2 -->
<div id="menu2">
    <a href="/carrera s" target="_top" class="dx">Admisión</a> 
    <a  href="/postgrado" target="_top">Postgrado</a> 
    <a  href="/investigacion" target="_top">Investigación</a> 
    <a  href="/pdn/archivo" target="_top">Noticias</a> 
    <a  href="/agenda" target="_top">Agenda</a> 
    <a  href="/universidad" target="_top">Universidad</a>
</div>



    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="login">
                <form class="form-signin" role="form">
                    <div class="text-center">
                        <span class="icon-facebook"></span>
                    </div>
                    <input id="txtEmail" type="email" class="form-control" placeholder="Email">
                    <input type="password" class="form-control" placeholder="Password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

<footer>
    <p>
      <strong>Powered by Pony®</strong>
    </p>
    <a href=""> <span class="icon-facebook"></span></a>
    <a href=""><span class="icon-twitter"></span></a>
    <a href=""><span class="icon-youtube3"></span></a>
      
</footer>

<script src="<?= base_url('js/bootstrap.css') ?>"></script>

</body>
</html>