<?php
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';
		
	  if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$banco->insert("produto", array(
			"nome" => $_POST['nome'], 
			"cod_produto" => $_POST['cod_produto'], 
			"preco_custo" => $_POST['preco_custo'],
			"preco_venda" => $_POST['preco_venda'],
			"quantidade"  => $_POST['quantidade'],
			"status" => $_POST['status']
		));
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
	<script language="javascript" src="assets/js/mascaraValidacao.js"></script>
</head>
<body>
	<div class="container">
	<a href="produto.php" class="btn btn-info btn-xs">Voltar</a>
</div>
<div class="container">
<form method="POST" class="form-horizontal" action="ad_produto.php">
<fieldset>
	<div class="panel panel-primary">
	<div class="panel-heading">Cadastro de Produtos</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigat�rio </p>
				</div>
			</div>				
				<div class="form-group">
					<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>
					<div class="col-md-5">
						<input type="text" name="nome" required autofocus class="form-control maiuscula">
					</div>
				</div> 

				<div class="form-group">
					<label class="col-md-2 control-label" for="Co">C�digo do Produto <h11>*</h11></label>
					<div class="col-md-3">
						<input type="text" name="cod_produto" required class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="preco_custo">Pre�o de custo:<h11>*</h11></label>
					<div class="col-md-3">				
						<input type="text" id="preco_custo" name="preco_custo" required class="form-control inputs" onKeyUp="moeda(this);">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label" for="preco_venda">pre�o de Venda:<h11>*</h11></label>
					<div class="col-md-3">			
						<input type="text" name="preco_venda" required class="form-control inputs" onKeyUp="moeda(this);">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="quantidade">Quantidade:<h11>*</h11></label>
					<div class="col-md-3">			
						<input type="text" name="quantidade" required class="form-control inputs">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label" for="preco_custo">Status:<h11>*</h11></label>
					<div class="col-md-2">			
						<select class="form-control" name="status">
							<option value=""></option>
							<option value="A">Ativo</option>
							<option value="I">Inativo</option>
						</select>
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
</div>
</body>