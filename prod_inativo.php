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
<h1>Produtos</h1>
<div class="row col-md-10 col-md-offset-1 custyle">
	<a href="produto.php" class="btn btn-primary btn-xs pull-right" style="margin-left: 5px;"><b>< </b> Voltar</a>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Preço de Custo</th>
            <th>Preço de Venda</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
            <?php
	$banco->query("SELECT * FROM produto WHERE status = 'I' order by nome");
					if($banco->numRows() > 0){
							foreach($banco->result() as $post) {
									//print_r($post);
							
							echo '<tr class="success">';
							echo '<td>'.$post['nome'].'</td>';
							echo '<td>'.'R$ '.$post['preco_custo'].'</td>';
							echo '<td>'.'R$ '.$post['preco_venda'].'</td>';
							echo '<td>'.$post['quantidade'].'</td>';
							echo '<td>'.$post['status'].'</td>';
							echo '<td class="text-center"> <a class="btn btn-success btn-xs" href="ativar_prod.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Ativar</a></td>';		
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