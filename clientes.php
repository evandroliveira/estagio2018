<?php
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';
		
	  
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
	<h1>Clientes</h1>
<div class="row col-md-10 col-md-offset-1 custyle">
	<a href="cli_inativo.php" class="btn btn-warning btn-xs pull-right" style="margin-left: 5px;"><b>+</b> Clientes Inativos</a>
	<a href="ad_cliente.php" class="btn btn-primary btn-xs pull-right"><b>+</b>Novo Cliente</a>
	<table class="table table-striped custab">
	<thead>
     <tr>
		<th>Nome</th>
		<th>email</th>
		<th>Celular</th>
		<th>Status</th>
		<th class="text-center">Ações</th>
	  </tr>
	</thead>
	<?php
	$banco->query("SELECT * FROM cliente 
					WHERE status = 'A'
					ORDER BY nome");
	if($banco->numRows() > 0){
		foreach($banco->result() as $post) {
		
		echo '<tr class="success">';
		echo '<td>'.$post['nome'].'</td>';;
		echo '<td>'.$post['email'].'</td>';
		echo '<td>'.$post['celular'].'</td>';
		echo '<td>'.$post['status'].'</td>';
		echo '<td class="text-center"><a class="btn btn-info btn-xs" href="editar_cli.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Editar</a> <a href="inativar_cli.php?id='.$post['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicom-remove"></span>Inativar</a></td>';		
		echo '</tr>';
	}
} else {
	?>
		<script type="text/javascript">
			alert("Não houve resultados");
		</script>
	<?php
}			


	?>
</table>
</div>
