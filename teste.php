<?php 
	header('Content-Type: text/html; charset=utf-8', true);
	require 'assets/pages/menu.php';
	require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);	
	$estado_id = addslashes($_POST['estado_id']);	
	$status = addslashes($_POST['status']);

$sql = "INSERT INTO cidade SET estado_id = UPPER('$estado_id'), nome = UPPER('$nome'), status = UPPER('$status')";

	$pdo->query($sql);

	
}
?>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
	
<fieldset>
<div class="panel panel-primary">

<div class="panel-heading">Cadastro de Cidade</div>

<div class="panel-body">
<form method="POST" class="form-horizontal">

	<div class="form-group">
		<div class="col-md-11 control-label">
			<p class="help-block"><h11>*</h11> Campo Obrigatório</p>
		</div>						
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>
		<div class="col-md-5">
			<input id="Nome" type="text" name="nome" required autofocus  class="form-control input-md"/>
		</div>						
	</div>

	<div class="form-group">
		<label class="col-md-2 control-label" for="Estado">Estado <h11>*</h11></label>
	   <div class="col-md-3">						
		<select class="form-control input-md" name="estado_id" required id="estado_id">	 
	 	<?php
	 		require 'classes/banco.php';
	 		require 'classes/conexao.php';

			$banco->query("SELECT id, nome FROM estado
						ORDER BY nome");
			if($banco->numRows() > 0){
					foreach($banco->result() as $post) {
					echo '<option value=""></option>';
					echo '<option value="'.$post['id'].'".>'.$post['nome'].'</option>';
				}
			} else {
				?>
					<script type="text/javascript">
						alert("Não houve resultados");
					</script>
				<?php
			}		
			
	 	?>
		</select>
	  </div>
	</div>

		<div class="form-group">
			<label class="col-md-2 control-label" for="status">Status <h11>*</h11></label>
		  <div class="col-md-3">							
		   <select class="form-control input-md" id="status" name="status" required>
		   		<option value=""></option>
		   		<option value="A">Ativo</option>
		   		<option value="I">Inativo</option>
		   </select>  
		  </div>                              
		</div>	

		<div class="form-group">
		  <label class="col-md-2 control-label" for="Cadastrar"></label>
		  <div class="col-md-8">
		    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
		    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
			 </div>
		</div>
				    	
	</div>
</fieldset> 
</form> 
			    	

	<br><br>
	<?php
				 
  if(isset($_POST['nome']) && !empty($_POST['nome'])) {
  	$nome = addslashes($_POST['nome']);
  	$sigla = addslashes($_POST['sigla']);
  	$status = addslashes($_POST['status']);
  	

	$sql = "INSERT INTO estado SET nome = UPPER('$nome'), sigla = UPPER('$sigla') ,status = UPPER('$status')";

	$pdo->query($sql);
	
}
			?>
<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#janela">Novo Estado</button>

        <div id="janela" class="modal" role="dialog">
              <div class="modal-dialog">
                    <div class="modal-content">
                          <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cadastrar Estado    </h4>
                          </div>
                          <div class="modal-body">
                          <form class ="form-signin" method ="POST" >
                             
                                   <div class="form-group">
                              Nome *
                              <input type="text" name="nome" autofocus required class="form-control"/>
                            </div>
                              <div class="form-group">
                              Sigla *
                              <input type="text" name="sigla" autofocus required class="form-control"/>
                            </div>
                            <div class="form-group">
                              Status:
				    		   <select class="form-group" name="status"  >
				    		   		<option value="A">Ativo</option>
				    		   		<option value="I">Inativo</option>
				    		   </select>                                
				    		</div>
                            
                              <input class="btn btn-info btn-lg btn-block" type="submit" src="ad_cidade.php" value="Cadastrar">
                              <button class="btn btn-danger btn-lg btn-block" data-dismiss="modal">Cancelar</button>
                            </form>

                      
                    </div>
                 </div>
               </div>				
			</div>
		    </div>

