<?php
require 'config.php';
require 'classes/lote.class.php';
require 'classes/banco.php';
require 'classes/conexao.php';
require 'assets/pages/menu.php';
	$u = new lote();
	if(isset($_POST['numero_lote']) && !empty($_POST['numero_lote'])) {
		$numero_lote = addslashes($_POST['numero_lote']);
		$validade_lote = addslashes($_POST['validade_lote']);
		$quantidade = addslashes($_POST['quantidade']);

		if(!empty($numero_lote) && !empty($validade_lote) && !empty($quantidade)) {
			if($u->cadastrarl($numero_lote, $validade_lote, $quantidade)) {
				?>
				
				<div class="alert alert-success">
					Lote Cadastrado com sucesso! 
				</div>
				
				
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Est Lote já existe! 
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
	<a href="lote.php" class="btn btn-info btn-xs">Voltar</a>
       
<form method="POST" class="form-horizontal" name="frmCadastro" id="frmCadastro" action="ad_lote.php" >
<fieldset>
	<div class="panel panel-primary">
		<div class="panel-heading">Cadastro de Lote</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
				</div>
			</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Numero do Lote">Numero do Lote <h11>*</h11></label>  
  				<div class="col-md-5">
  					<input type="text" name="numero_lote" id="numero_lote" size="40" maxlength="40" class="form-control input-md maiuscula" autofocus>
  				</div>			
		</div>
			
		<div class="form-group">
			<label class="col-md-2 control-label" for="Validade">Validade <h11>*</h11></label>  
  				<div class="col-md-5">
  					<input type="date" name="validade_lote" id="validade_lote" size="40" maxlength="40" class="form-control input-md maiuscula" autofocus>
  				</div>			
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label" for="Quantidade">Quantidade <h11>*</h11></label>  
  				<div class="col-md-5">
  					<input type="text" name="quantidade" id="quantidade" size="40" maxlength="40" class="form-control input-md maiuscula" autofocus>
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
