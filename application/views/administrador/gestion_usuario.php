<script>
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>

<div>
      <?= form_open('home/insertusuario', array('class' => 'form_horizontal'));?>
  
        <div class="form-horizontal">
          <fieldset>
              <legend> Crear nuevo usuario Profesor </legend>
                  
                  <div class="control-group">
                    <label class="control-label"> Nombre:</label>
                      <div class="controls">
                        <?= form_input(array('type'=> 'text', 'name' => 'usuario','id'=>'usuario')); ?>
                      </div>  
            
                  </br>
          
                    <label class="control-label">Rut:</label>
                      <div class="controls">
                       <?= form_input(array('type'=> 'text', 'name' => 'rut','id'=>'rut')); ?>
                      </div>  
            
                  </br>
          
                    <label class="control-label"> Telefono:</label>
                      <div class="controls">
                       <?= form_input(array('type'=> 'text', 'name' => 'telefono','id'=>'telefono')); ?>
                      </div>
                  
                  </br>
          
                    <label class="control-label"> Contraseña:</label>
                      <div class="controls">
                       <?= form_input(array('type'=> 'password', 'name' => 'pass','id'=>'pass')); ?>
                      </div>

                  </br>
          
                    <label class="control-label"> Mail:</label>
                      <div class="controls">
                       <?= form_input(array('type'=> 'text', 'name' => 'mail','id'=>'mail')); ?>
                      </div>
                  
                  </br>
          
                    <label class="control-label"> Tipo Usuario:</label>
                      <div class="controls">
                       <?= form_input(array('type'=> 'text', 'name' => 'tipousuario','id'=>'tipousuario', 'value'=>'Profesor', 'readonly'=>'readonly')); ?>
                      </div>
                  </br>  

    </fieldset>
  </div>

    <div class="form-action">
    <?= form_button(array('type'=> 'submit', 'content'=>'Guardar', 'class'=>'btn btn-primary','onclick' => 'showUser(this.value)')) ?>
    
  </div>
  <?= form_close(); ?>
</div>

</br>
</br>

<table class="table table-condensed table-bordered">
<thead>
  <tr>
    <th>ID USER</th>
    <th>Nombre Usuario</th>
    <th>Telefono</th>
    <th>Mail</th>
    <th>Tipo Usuario</th>
  </tr>
</thead>

<tbody>
  <?php $result = $this->model_usuario->all(); ?>
  <?php foreach ($result as $row): ?>
  <tr>
      <td> <?= $row->id ?> </td>
      <td> <?= $row->usuario ?> </td>
      <td> <?= $row->telefono ?> </td>
      <td> <?= $row->mail ?> </td>
      <td> <?= $row->tipousuario ?> </td>
      <!--Modificar -->
      <?= form_open('home/edituser/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      <td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-edit"></i>', 'class'=>'btn'))?>
      <?= form_close();?>
      <!--Eliminar-->
      <?= form_open('home/delateuser/'.$row->id,$row->id, array('class'=>'form_horizontal'));?>
      <td> <?= form_button(array('type'=>'submit', 'content'=>'<i class="icon-remove"></i>', 'class'=>'btn'))?>
      <?= form_close();?>
  </tr>

  <?php endforeach; ?>
</tbody>
</table>
