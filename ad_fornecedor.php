<?php 
require 'config.php';
require 'classes/fornecedor.class.php';
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';

$u = new Fornecedor();
	if(isset($_POST['nome']) && !empty($_POST['nome'])) {
		$nome = addslashes($_POST['nome']);
		$cnpj = addslashes($_POST['cnpj']);
		$endereco = addslashes($_POST['endereco']);
		$numero = addslashes($_POST['numero']);
		$bairro = addslashes($_POST['bairro']);
		$telefone = addslashes($_POST['telefone']);
		$celular = addslashes($_POST['celular']);
		$email = addslashes($_POST['email']);
		$status = addslashes($_POST['status']);
		$cidade_id = $_POST['cidade_id'];

		if(!empty($nome) && !empty($cnpj) && !empty($endereco) && !empty($numero) && !empty($bairro) && !empty($telefone) && !empty($celular) && !empty($email) && !empty($status) && !empty($cidade_id)) {
			if($u->cadastrarfor($nome, $cnpj, $endereco, $numero,$bairro,$telefone, $celular, $email, $status, $cidade_id)) {
				?>
				
				<div class="alert alert-success">
					Fornecedor Cadastrado com sucesso! 
				</div>
				
				
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Este Fornecedor já existe! 
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
	<script language="javascript" type="text/javascript" src="assets/js/mascaraValidacao.js"></script>
</head>
<body>
<div class="container">
  <div class="row col-md-10 col-md-offset-1 custyle">
	<a href="fornecedor.php" class="btn btn-info btn-xs">Voltar</a>
	<form method="POST" class="form-horizontal" name="form1" action="ad_fornecedor.php">
		<fieldset>
			<div class="panel panel-primary">
				<div class="panel-heading">Cadastro de Fornecedor</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-11 control-label">
						        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
						</div>
					</div>
					<div class="form-group">
						<div class="form-group">
							  <label class="col-md-2 control-label" for="Nome">Nome <h11>*</h11></label>  
							  <div class="col-md-8">
							  <input type="text" id="nome" name="nome" placeholder="Nome Completo" class="form-control input-md" required autofocus>
							  </div>
						</div>

							<!-- Text input-->
							<div  class="form-group">
							  <label class="col-md-2 control-label" for="cnpj">CNPJ <h11>*</h11></label>  
							  <div class="col-md-3">						  	
							  <input type="text" id="cnpj" name="cnpj" onBlur="ValidarCNPJ(form1.cnpj);" required 	onKeyPress="MascaraCNPJ(form1.cnpj);" maxlength="18">
							  </div>					
							</div>

				    </div>

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="telefone">Telefone <h11>*</h11></label>
							  <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							      <input type="text" id="telefone" name="telefone" class="form-control" placeholder="XX XXXXX-XXXX" required onKeyPress="MascaraTelefone(form1.telefone);" maxlength="14"  onBlur="ValidaTelefone(form1.telefone);">
							    </div>
							  </div>
							  
							    <label class="col-md-1 control-label" for="celular">Celular</label>
							     <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
							      <input id="celular" name="celular" class="form-control" placeholder="XX XXXXX-XXXX" type="text" onKeyPress="MascaraCelular(form1.celular);" maxlength="15"  onBlur="ValidaCelular(form1.celular);">
							    </div>
							  </div>
							 </div> 

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email <h11>*</h11></label>
							  <div class="col-md-5">
							    <div class="input-group">
							      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							      <input id="email" name="email" class="form-control" placeholder="email@email.com" required="" type="email" >
							    </div>
							  </div>
							</div>

							<!-- Prepended text-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="endereco">Endereço</label>
							  <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Av./Rua</span>
							      <input id="endereco" name="endereco" class="form-control" placeholder="" required type="text">
							    </div>
							    
							  </div>
							    <div class="col-md-2">
							    <div class="input-group">
							      <span class="input-group-addon">Nº <h11>*</h11></span>
							      <input id="numero" name="numero" class="form-control" placeholder required type="number">
							    </div>
							    
							  </div>
							  
							  <div class="col-md-3">
							    <div class="input-group">
							      <span class="input-group-addon">Bairro</span>
							      <input id="bairro" name="bairro" class="form-control" placeholder="" required type="text">
							    </div>
							    
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-md-2 control-label" for="prependedtext"></label>
							  <div class="col-md-4">
							    <div class="input-group">
							      <span class="input-group-addon">Cidade</span>
							      <select name="cidade_id" id="cidade_id" class="form-control">
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
</body>