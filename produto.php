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
<div class="row col-md-10 col-md-offset-0 custyle">
	<a href="prod_inativo.php" class="btn btn-warning btn-xs pull-right" style="margin-left: 5px;"><b>+</b> Produtos Inativos</a>
    <a href="ad_produto.php" class="btn btn-success btn-xs pull-right" "><b>+</b> Novo Produto</a>
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
	$banco->query("SELECT * FROM produto WHERE status = 'A' order by nome");
					if($banco->numRows() > 0){
							foreach($banco->result() as $post) {
									//print_r($post);
							
							echo '<tr class="success">';
							echo '<td>'.$post['nome'].'</td>';
							echo '<td>'.'R$ '.$post['preco_custo'].'</td>';
							echo '<td>'.'R$ '.$post['preco_venda'].'</td>';
							echo '<td>'.$post['quantidade'].'</td>';
							echo '<td>'.$post['status'].'</td>';
							echo '<td class="text-center"><a class="btn btn-info btn-xs" href="editar_produto.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Editar</a> <a class="btn btn-danger btn-xs" href="inativar_prod.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Inativar</a></td>';		
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