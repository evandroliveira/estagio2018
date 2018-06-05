<?php
require 'config.php';
require 'assets/pages/menu.php';

$id = 0;
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = addslashes($_GET['id']);
}

if(isset($_POST['numero_lote']) && !empty($_POST['numero_lote'])) {
	$numero_lote = addslashes($_POST['numero_lote']);
	$validade_lote = addslashes($_POST['validade_lote']);
	$quantidade = addslashes($_POST['quantidade']);

	$sql = "UPDATE lote SET numero_lote = '$numero_lote', validade_lote = '$validade_lote', quantidade = '$quantidade' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: lote.php");
}
	
$sql = "SELECT * FROM lote WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$dado = $sql->fetch();
} else {
	header("Location: ad_lote.php");
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
		<div class="panel-heading">Editar Lote</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="col-md-11 control-label">
				        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
				</div>
			</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Numero do Lote">Numero do Lote <h11>*</h11></label>  
  			<div class="col-md-5">
				<input type="text" name="numero_lote" id="numero_lote" class="form-control maiuscula input-md" size="40" maxlength="40" value="<?php echo $dado['numero_lote']; ?>"  />
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label" for="Validade" >Validade <h11>*</h11></label>
			<div class="col-md-2">
				<input type="text" name="validade_lote" id="validade_lote" class="form-control maiuscula input-md" value="<?php echo $dado['validade_lote'] ?>" />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-md-2 control-label" for="Quantidade" >Quantidade <h11>*</h11></label>
			<div class="col-md-2">
				<input type="text" name="quantidade" id="quantidade" class="form-control maiuscula input-md" value="<?php echo $dado['quantidade'] ?>" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-2 control-label" for="Alterar"></label>
			 <div class="col-md-8">
			     <button id="alterar" name="alterar" class="btn btn-success" type="Submit">Alterar</button>
  			</div>
		</div>






