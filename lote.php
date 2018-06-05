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
<h1>Lote</h1>
<div class="row col-md-9 col-md-offset-0 custyle">
	
    <a href="ad_lote.php" class="btn btn-success btn-xs pull-right" "><b>+</b> Novo Lote</a>
    <table class="table table-striped custab">
    <thead>
        <tr>
            <th>Lote</th>
            <th>Validade</th>
            <th>Quantidade</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
            <?php
	$banco->query("SELECT * FROM lote order by numero_lote");
					if($banco->numRows() > 0){
							foreach($banco->result() as $post) {
									//print_r($post);
							
							echo '<tr class="success">';
							echo '<td>'.$post['numero_lote'].'</td>';
							echo '<td>'.$post['validade_lote'].'</td>';
							echo '<td>'.$post['quantidade'].'</td>';
							echo '<td class="text-center"><a class="btn btn-info btn-xs" href="editar_lote.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Editar</a> </td>';
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