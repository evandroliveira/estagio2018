<?php
require 'config.php';
require 'assets/pages/menu.php';

$id = 0;
if(isset($_GET['id']) && !empty($_GET['id'])) {
  $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$cpf = addslashes($_POST['cpf']);
	$rg = addslashes($_POST['rg']);
	$endereco = addslashes($_POST['endereco']);
	$numero = addslashes($_POST['numero']);
	$bairro = addslashes($_POST['bairro']);
	$telefone = addslashes($_POST['telefone']);
	$celular = addslashes($_POST['celular']);
	$email = addslashes($_POST['email']);
	$cidade_id = addslashes($_POST['cidade_id']);
	$status = addslashes($_POST['status']);

	$sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', rg = '$rg', endereco = '$endereco', numero = '$numero', bairro = '$bairro', telefone = '$telefone', celular = '$celular', email = '$email',  cidade_id = '$cidade_id', status = '$status' WHERE id = '$id'";
	$pdo->query($sql);

	header("Location: cliente.php");
}
	
$sql = "SELECT * FROM cliente WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$dado = $sql->fetch();
} else {
	header("Location: ad_cliente.php");
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
  <div class="row col-md-10 col-md-offset-1 custyle">
	<a href="clientes.php" class="btn btn-info btn-xs">Voltar</a>
	<form method="POST" class="form-horizontal" name="form1" action="ad_cliente.php">
		<fieldset>
			<div class="panel panel-primary">
				<div class="panel-heading">Editar Cliente</div>
				<div class="panel-body">
					<div class="form-group">
						
					</div>
					<div class="form-group">
						<div class="form-group">
							  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
							  <div class="col-md-8">
							  <input type="text" id="nome" name="nome" placeholder="Nome Completo" class="form-control input-md" value="<?php echo $dado['nome']; ?>">
							  </div>
						</div>

							<!-- Text input-->
							<div  class="form-group">
							  <label class="col-md-2 control-label" for="cpf">CPF <h11>*</h11></label>  
							  <div class="col-md-3">						  	
							  <input type="text" id="cpf" name="cpf" onBlur="ValidarCPF(form1.cpf);" required 	onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" value="<?php echo $dado['cpf']; ?>">
							  </div>
							  
							  <label class="col-md-2 control-label" for="Nome">RG <h11>*</h11></label>
							  <div class="col-md-2">
							  <input type="text" id="rg" name="rg" placeholder="Apenas números" class="form-control input-md" required=""  maxlength="11" pattern="[0-9]+$" value="<?php echo $dado['rg']; ?>">
							  </div>
							</div>

				    </div>

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="telefone">Telefone <h11>*</h11></label>
							  <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							      <input type="text" id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required onKeyPress="MascaraTelefone(form1.telefone);" maxlength="14"  onBlur="ValidaTelefone(form1.telefone);" value="<?php echo $dado['telefone']; ?>">
							    </div>
							  </div>
							  
							    <label class="col-md-1 control-label" for="celular">Celular</label>
							     <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							      <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" type="text" onKeyPress="MascaraCelular(form1.celular);" maxlength="15"  onBlur="ValidaCelular(form1.celular);" value="<?php echo $dado['celular']; ?>">
							    </div>
							  </div>
							 </div> 

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email <h11>*</h11></label>
							  <div class="col-md-5">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							      <input id="email" name="email" class="form-control"  required="" type="email" value="<?php echo $dado['email']; ?>" >
							    </div>
							  </div>
							</div>

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="endereco">Endereço</label>
							  <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Av./Rua</span>
							      <input id="endereco" name="endereco" class="form-control" placeholder="" required type="text" value="<?php echo $dado['endereco']; ?>">
							    </div>
							    
							  </div>
							    <div class="col-md-2">
							    <div class="input-group">
							      <span class="input-group-addon">Nº <h11>*</h11></span>
							      <input id="numero" name="numero" class="form-control" placeholder required type="number" value="<?php echo $dado['numero']; ?>">
							    </div>
							    
							  </div>
							  
							  <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon">Bairro</span>
							      <input id="bairro" name="bairro" class="form-control" placeholder="" required type="text" value="<?php echo $dado['bairro']; ?>">
							    </div>
							    
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-2 control-label" for="prependedtext"></label>
							  <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Cidade</span>
							      <select name="cidade_id" id="cidade_id" class="form-control" ">
									<?php
										$banco->query("SELECT id, nome FROM cidade
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
							  </div>
							  <label class="col-md-2 control-label" for="status">Status <h11>*</h11></label>
							<div class="col-md-2">
									<select id="status" name="status" required class="form-control">
										<option value="A">Ativo</option>
										<option value="I">Inativo</option>
									</select></p>
									</div>
							</div>
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="Cadastrar"></label>
							  <div class="col-md-8">
							    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
							    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
							  </div>
							</div>
						</div>
					</div>
		</fieldset>
	</form>
</div>




