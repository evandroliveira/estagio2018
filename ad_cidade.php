<?php
require 'config.php';
require 'assets/pages/menu.php';
require 'classes/cidade.class.php';
require 'classes/banco.php';
require 'classes/conexao.php';
	$u = new Cidade();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$estado_id = addslashes($_POST['estado_id']);
		$status = $_POST['status'];

		if(!empty($nome) && !empty($estado_id) && !empty($status)) {
			if($u->cadastrarc($nome, $estado_id, $status)) {
				?>
				
				<div class="alert alert-success">
					Cidade Cadastrada com sucesso! 
				</div>
				
				
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Esta Cidade já existe! 
				</div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-warning">
				Preencha todos os campos!
			</div>
			<?php
		}

	}
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link rel="shortcut icon" type="image/png" href="assets/img/folha.png">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="asstes/js/form.js"></script>
</head>
<div class="container">
	<a href="cidade.php" class="btn btn-info btn-xs">Voltar</a>
	
	<a href="ad_estado1.php" class="btn btn-success btn-xs" style="position:relative; margin:0; margin-bottom:0;" style="position: relative; margin-left: 160px; margin-bottom: 10px;">Novo Estado
	</a>
       
<form method="POST" class="form-horizontal" name="frmCadastro" id="frmCadastro" action="ad_cidade.php" >
<fieldset>
	<div class="panel panel-primary">
		<div class="panel-heading">Cadastro de Cidade</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
				</div>
			</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  				<div class="col-md-5">
  					<input type="text" name="nome" id="nome" size="40" maxlength="40" class="form-control input-md maiuscula" autofocus>
  				</div>			
		</div>
		<div class="form-group">
		<label class="col-md-2 control-label" for="Estado">Estado <h11>*</h11></label>
		<div class="col-md-2">
			<select name="estado_id" id="estado_id" class="form-control">
				<?php
					$banco->query("SELECT id, nome FROM estado
									WHERE status = 'A'
									ORDER BY nome");
					if($banco->numRows() > 0){
						foreach($banco->result() as $post) {
						
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
			<label class="col-md-2 control-label" for="Status">Status <h11>*</h11></label>
			<div class="col-md-2">
			<select id="status" name="status" class="form-control  maiuscula">
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select></p>
			</div>
	    </div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Cadastrar"></label>
			 <div class="col-md-8">
			     <button id="cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
				 <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  			</div>
		</div>
 </div>
</div>
	</fieldset>
</form>
