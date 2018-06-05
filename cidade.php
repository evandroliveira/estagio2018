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
<h1>Cidade</h1>
<div class="row col-md-6 col-md-offset-2 custyle">
	<a href="cid_inativa.php" class="btn btn-warning btn-xs pull-right" style="margin-left: 5px;"><b>+</b> Cidades Inativas</a>
    <a href="ad_cidade.php" class="btn btn-success btn-xs pull-right"><b>+</b> Nova Cidade</a>
    <table class="table table-striped custab">
    <thead>

        <tr>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Status</th>
            <th class="text-center">Ações</th>
        </tr>
    </thead>
            <?php
	$banco->query("SELECT c.id, c.nome, e.nome as estado, c.status
	  		       FROM cidade c			    
			       LEFT JOIN estado e on e.id = c.estado_id
			       WHERE c.status = 'A'
			       ORDER BY c.nome");
					if($banco->numRows() > 0){
							foreach($banco->result() as $post) {
									//print_r($post);
							
							echo '<tr class="success">';
							echo '<td>'.$post['nome'].'</td>';
							echo '<td>'.$post['estado'].'</td>';
							echo '<td>'.$post['status'].'</td>';
							echo '<td class="text-center"><a class="btn btn-info btn-xs" href="editar_cid.php?id='.$post['id'].'"><span class=glyphicon glyphicon-edit</span>Editar</a> <a href="inativar_cid.php?id='.$post['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicom-remove"></span>Inativar</a></td>';		
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