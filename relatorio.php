<?php 
require 'config.php';
require 'assets/pages/menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrinho</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link rel="shortcut icon" type="image/png" href="assets/img/folha.png">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container">
<table class="table table-striped custab">
    <thead>
    	<h1>Estoque de Produtos</h1>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <!--<th>Preço de Venda</th>-->
        </tr>
    </thead>
<?php
	
	$sql = $pdo->prepare("SELECT * FROM produto");
	$sql->execute();
	$fetch = $sql->fetchAll();
	foreach($fetch as $produto) {
		
		echo '<tr class="success">';
		echo '<td>'.$produto['nome'].'</td>';
		echo '<td>'.$produto['quantidade'].'</td>';
		//echo '<td>'.number_format($produto['preco_venda'],2,",",".").'</td>';

	}
?>
</table>
</div>
</body>
</html>


<script type="text/javascript">
	window.print();
</script>