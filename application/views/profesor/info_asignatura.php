<!-- <?= form_open('home/info_unidades', array('class' => 'form_horizontal'));?>		-->
<?= form_open('home/insertdescripcion', array('class' => 'form_horizontal'));?>   	
<div>
	<ul class="nav nav-tabs" role="tablist">
  	 	
  	 	<li class="active"><a href="info_asignatura">Información de Asignatura</a></li>
 		<li><a href="info_unidades">Unidades</a></li>
 		<li><a href="info_contenidos">Contenidos</a></li>
 		<li><a href="info_sesiones">Sesiones</a></li>
		<li><a href="info_evaluaciones">Evaluaciones</a></li>
		<li><a href="info-bilbiografia">Bibliografia</a></li>

	</ul>	
<form class="form-horizontal">
<div class=''>  
        <fieldset>  
        	<p>Si desea ayuda haga clik en Ayuda </p>
		<div class="btn-toolbar">
  			<div class="btn-group">
 			<a class="fancybox-button" rel="fancybox-button" href="<?= base_url('img/info_asignatura.png')?>" title="Ayuda Syllabus">
			<img src="<?= base_url('img/ayuda.png')?>" alt=""/>
			</a>
				
 			 </div>
		</div>
        	<legend>Información asignatura</legend> 
		  		
		  		
		  		<div class="control-group">
		  			<label class="control-label"> Carrera:</label>		
		 			<div class="controls">
		 			<span class="uneditable-input"> Ingenieria Civil Informatica</span>									
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Sigla: </label>
					<div class="controls">
					
<!--					<input type="text" name="sigla" value="<?php set_value('$this->input->post("sigla")'); ?>"  /> -->

<!--					<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" /> -->


					<span class="uneditable-input"> <?= $this->input->post('sigla'); ?></span>	
					<!-- Colocar aqui la sigla del ramo a crear -->
					</div>
		  		</div>
				<div class="control-group">
		  			<label class="control-label"> Nombre Asignatura: </label>
					<div class="controls">
					<span class="uneditable-input"> <?= $this->input->post('nombre'); ?></span>
					<!-- Colocar aqui el Nombre de la asignatura-->
					</div>
		  		</div>

<!-- tienen que ser almacenadas en la bd-->

				<div class="control-group">
		  			<label class="control-label"> Descripción de la Asignatura: </label>
					<div class="controls">
					<?= form_textarea(array('type'=> 'text', 'class'=>'input-xxlarge', 'placeholder'=>'Lorem ipsum dolor sit amet ...','name' => 'descripcion_asig','id'=>'descripcion_asig')); ?>
				<!--	<textarea class="input-xlarge" placeholder="Lorem ipsum dolor sit amet..."></textarea> 
				-->


					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Contribución de la Asignatura: </label>
					<div class="controls">
					<?= form_textarea(array('type'=> 'text', 'class'=>'input-xxlarge', 'placeholder'=>'Lorem ipsum dolor sit amet ...','name' => 'contribucion_asig','id'=>'contribucion_asig')); ?>
				<!--	<textarea class="input-xlarge" placeholder="Lorem ipsum dolor sit amet..."></textarea> 
					-->
					</div>
		  		</div>

				<legend>Red de Aprendizaje</legend>
				<div class="control-group">
		  			<label class="control-label"> Pre-requisito(s): </label>
					<div class="controls">					 
					 <textarea class="uneditable-input" readonly="readonly"><?= $this->input->post('corequisito'); ?></textarea> 
		
		<!-- <?= form_input(array('type'=> 'textarea', 'name' => 'prerequisito','id'=>'prerequisito')); ?>    -->
					

					 <!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
				<div class="control-group">
		  			<label class="control-label"> Co-requisito(s): </label>
					<div class="controls">
					<textarea class="input-xlarge" readonly="readonly"> <?= $this->input->post('prerequisito'); ?> </textarea>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Area de enseñanza: </label>
					<div class="controls"> 
					<textarea class="input-large" readonly="readonly"> <?= $this->input->post('area_ensenanza'); ?></textarea>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Año malla curricular: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $this->input->post('ano_malla'); ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Semestre malla curricular: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $this->input->post('semestre_malla'); ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
				
				<!--HORAS-->
				<div class="control-group">
		  			<label class="control-label"> Horas catedras por semestre: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $this->input->post('hcxsemestre'); ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Horas ayudantias por semana: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $this->input->post('haxsemana'); ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>
		  		<div class="control-group">
		  			<label class="control-label"> Horas laboratorios por semana: </label>
					<div class="controls">
						<span class="uneditable-input"><?= $this->input->post('hlxsemana'); ?></span>
					<!--Aqui va lo traido de base de datos-->
					</div>
		  		</div>

<!-- tienen que ser almacenadas en la bd-->

				<legend>Introducción</legend>
				<div class="control-group">
		  			<label class="control-label"> Bienvenida a Alumnos: </label>
					<div class="controls">
					<?= form_textarea(array('type'=> 'text','class'=>'input-xxlarge', 'placeholder'=>'Lorem ipsum dolor sit amet ...', 'name' => 'introduccion','id'=>'introduccion')); ?>
				<!--	<textarea class="input-xlarge" placeholder="Lorem ipsum dolor sit amet..."></textarea>
					-->
					</div>
		  		</div>

         <div class="form-action">
		<?= form_button(array('type'=> 'submit', 'content'=>'Guardar', 'class'=>'btn btn-primary')) ?>		
		<?= anchor('asignatura/index', 'cancelar', array('class'=>'btn'))?>
		</div>


          <!--
          <div class="form-actions">  
            <button type="submit" class="btn btn-primary">Guardar</button>  
            <button class="btn"> Salir</button>  
          </div> -->  
        </fieldset>  
</form>  
<div>