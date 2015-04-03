

<?php $result = $this->model_carrera->find($this->session->userdata('carrera')); ?>

<?= form_open('home/updatecarrera', array ('class' => 'form-horizontal')); ?>  
        <fieldset>  
          <legend>Gestión Carrera</legend>  



	<div class="control-group">
		  			<label class="control-label"> Perfil de Egreso: </label>
					<div class="controls">
					<!--<textarea class="input-xlarge" id="input02" value="<?= $result->perfil_egreso ?>"></textarea> -->
					<?= form_textarea(array('type'=>'text', 'class'=>'input-xxlarge', 'value'=> $result->perfil_egreso, 'name'=>'perfil_egreso', 'id'=>'perfil_egreso'));?>
					</div>
		  		</div>

	<div class="control-group">
		  			<label class="control-label"> Misión: </label>
					<div class="controls">
					<?= form_textarea(array('type'=>'text', 'class'=>'input-xxlarge', 'value'=> $result->mision, 'name'=>'mision', 'id'=>'mision'));?>
					</div>
		  		</div>
	
	<div class="control-group">
		  			<label class="control-label"> Visión: </label>
					<div class="controls">
					<?= form_textarea(array('type'=>'text', 'class'=>'input-xxlarge', 'value'=> $result->vision, 'name'=>'vision', 'id'=>'vision'));?>
					</div>
		  		</div>

          <div class="form-actions">  
          	<?= form_button(array('type'=> 'submit', 'content'=>'Aceptar', 'class'=>'btn btn-primary')) ?>
            <!--<button type="submit" class="btn btn-primary">Guardar</button>-->  
            <button class="btn">Cancel</button>  
          </div>  
        </fieldset>  
</form>  

