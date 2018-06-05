<?php
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';

?>

<head>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<div class="container">
<h1>Fornecedores Inativos</h1>
<div class="row col-md-10 col-md-offset-1 custyle">
	<a href="fornecedor.php" class="btn btn-primary btn-xs pull-right">Voltar</a>
    <table class="table table-striped custab">
    <thead>   
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Status</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
            <?php
	$banco->query("SELECT * FROM fornecedor WHERE status = 'I' order by nome");
					if($banco->numRows() > 0){
							foreach($banco->result() as $post) {
									//print_r($post);
							
							echo '<tr class="success">';
							echo '<td>'.$post['nome'].'</td>';
							echo '<td>'.$post['email'].'</td>';
							echo '<td>'.$post['celular'].'</td>';
							echo '<td>'.$post['status'].'</td>';
							echo '<td class="text-center"> <a class="btn btn-success btn-xs" href="ativar_forn.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Ativar</a></td>';	
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
</div>