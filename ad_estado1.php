<?php
	require 'config.php';
	require 'classes/estado.class.php';
	require 'assets/pages/menu.php';
	$u = new Estado();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$sigla = addslashes($_POST['sigla']);
		$status = $_POST['status'];

		if(!empty($nome) && !empty($sigla) && !empty($status)) {
			if($u->cadastrare($nome, $sigla, $status)) {
				header("Location: ad_cidade.php");
				?>				
				<div class="alert alert-success">
					Estado Cadastrado com sucesso! 
				</div>
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Este estado já existe! 
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
	<style type="text/css">
		input.maiuscula {
		  text-transform: uppercase;
			}
	</style>
</head>
<div class="container">
	<a href="ad_cidade.php" class="btn btn-info btn-xs">Voltar</a>
</div>
<div class="container">

<form method="POST" class="form-horizontal">
	<fieldset>
	<div class="panel panel-primary">
		<div class="panel-heading">Cadastro de Estado</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
				</div>
			</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  			<div class="col-md-5">
				<input type="text" name="nome" id="nome" class="form-control maiuscula input-md" size="40" maxlength="40" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Sigla" >Sigla <h11>*</h11></label>
			<div class="col-md-2">
				<input type="text" name="sigla" id="sigla" class="form-control maiuscula input-md"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Status">Status <h11>*</h11></label>
			<div class="col-md-2">
			<select id="status" name="status"  class="form-control">
				<option></option>
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select></p>
			</div>
	    </div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Cadastrar"></label>
			 <div class="col-md-8">
			     <button id="cadastrar" name="Cadastrar" class="btn btn-success" type="Submit" src="ad_cidade.php">Cadastrar</button>
				 <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  			</div>
		</div>
	</div>
</div>
</fieldset>
</form>
</div>


