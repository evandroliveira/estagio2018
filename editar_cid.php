<?php
require 'config.php';
require 'assets/pages/menu.php';

$id = 0;
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {
	$nome = addslashes($_POST['nome']);
	$estado_id = addslashes($_POST['estado_id']);
	$status = addslashes($_POST['status']);

	$sql = "UPDATE cidade SET nome = '$nome', estado_id = '$estado_id
', status = '$status' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: cidade.php");
}
	
$sql = "SELECT * FROM cidade WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$dado = $sql->fetch();
} else {
	header("Location: ad_cidadeo.php");
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
</head>

<div class="container">
	

<form method="POST" class="form-horizontal">
	<fieldset>
	<div class="panel panel-primary">
		<div class="panel-heading">Editar Cidade</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
				</div>
			</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
  			<div class="col-md-5">
				<input type="text" name="nome" id="nome" class="form-control maiuscula input-md" size="40" maxlength="40" value="<?php echo $dado['nome']; ?>"  />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Estado" >Estado <h11>*</h11></label>
			<div class="col-md-2">
				<input type="text" name="estado_id" id="estado_id" class="form-control maiuscula input-md" value="<?php echo $dado['estado_id'] ?>" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Status">Status <h11>*</h11></label>
			<div class="col-md-2">
			<select id="status" name="status"  class="form-control" name="status" value="<?php echo $dado['status']; ?>" />
				<option value="A">Ativo</option>
				<option value="I">Inativo</option>
			</select></p>
			</div>
	    </div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Cadastrar"></label>
			 <div class="col-md-8">
			     <button id="alterar" name="Alterar" class="btn btn-success" type="Submit">Alterar</button>
  			</div>
		</div>






