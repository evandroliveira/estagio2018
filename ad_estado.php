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
<body>
<div class="container">
	<a href="estado.php" class="btn btn-info btn-xs">Voltar</a>
</div>
<div class="container">

<form method="POST" class="form-horizontal" action="ad_estado.php">
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


<?php /*
header('Content-Type: text/html; charset=utf-8', true);
require 'assets/pages/menu.php';
require 'classes/banco.php';

$banco = new Banco("localhost", "cantinho", "root", "");
if(isset($_POST['nome']) && !empty($_POST['nome'])) {

$banco->insert("estado", array(
	"nome" => $_POST['nome'], 
	"sigla" => $_POST['sigla'], 
	"status" => $_POST['status']
));
}

  /*if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
  	$nome = addslashes($_POST['nome']);
  	$sigla = addslashes($_POST['sigla']);
  	$status = addslashes($_POST['status']);
  	

	$sql = "INSERT INTO estado SET nome = UPPER('$nome'), sigla = UPPER('$sigla') ,status = UPPER('$status')";

	$pdo->query($sql);

	
}*/
?><!--
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<div class="container">
	<div class="panel panel-primary">
		
		<div class="panel-heading">Cadastro de Estado</div>
		<div class="panel-body">
			<form method="POST" class="form-horizontal" action="ad_estado.php">
				<fildset>
					<div class="form-group">
						<div class="col-md-11 control-label">
							<p class="help-block"><h11>*</h11> Campo Obrigatório </p>
						</div>
					</div>	    
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>
						<div class="col-md-5">
							<input type="text" name="nome" required autofocus  class="form-control input-md" />
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"  for="Sigla">Sigla <h11>*</h11></label>
						<div class="col-md-2">
							<input type="text" name="sigla" class="form-control input-md" required ">		
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label" for="Status">Status <h11>*</h11></label>
						<div class="col-md-2">
							<select required id="Status" name="status" class="form-control" ">
								<option value=""></option>
								<option value="A">Ativo</option>
								<option value="I">Inativo</option>
							</select>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="Cadastrar"></label>
						<div class="col-md-8">
							<button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="submit" >Cadastrar</button>
							<button id="Cancelar" name="Canelar" class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>

				</div>
			</div>		
		</fildset>
	</form>
	
</div>-->
