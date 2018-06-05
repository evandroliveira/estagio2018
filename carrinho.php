<?php 
require 'config.php';
require 'assets/pages/menu.php';
require 'classes/compra.class.php';
require 'classes/banco.php';
require 'classes/conexao.php';
session_start();
$co = new Compra();
if(isset($_POST['fornecedor_id']) && !empty($_POST['fornecedor_id'])) {
		$fornecedor_id = addslashes($_POST['fornecedor_id']);
		$data = addslashes($_POST['data']);
		$valor_total = addslashes($_POST['valor_total']);
		$desconto = addslashes($_POST['desconto']);
		$valor_liquido = addslashes($_POST['valor_liquido']);
		$status = $_POST['status'];

		if(!empty($fornecedor_id) && !empty($data) && !empty($valor_total) && !empty($desconto) || empty($desconto) && !empty($valor_liquido) && !empty($status)) {
			if($u->cadastrarco($fornecedor_id, $data, $valor_total, $desconto, $valor_liquido, $status)) {
				?>
				
				<div class="alert alert-success">
					Compra Cadastrada com sucesso! 
				</div>
				
				
				<?php
			} else {
				?>
				<div class="alert alert-warning">
					Esta Cidade j� existe! 
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

if(!isset($_SESSION['itens'])) {

    $_SESSION['itens'] = array();
}

if(isset($_GET['add']) && isset($_GET['add']) == "carrinho") {
    //adiciona ao carrinho
    $idProduto = $_GET['id'];
    if(!isset($_SESSION['itens'] [$idProduto])) {

        $_SESSION['itens'] [$idProduto] = 1;
    }else {
        $_SESSION['itens'] [$idProduto] +=1;
    }
}

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

        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço de Venda</th>
            <th class="text-center">A??es</th>
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
            echo '<td>'.number_format($produto['preco_venda'],2,",",".").'</td>';
            echo '<td class="text-center"><a href="carrinho.php?add=carrinho&id='.$produto['id'].'">Adicionar ao carrinho</a></td>';
            echo '</tr>';

        }
        ?>
	<?php

		echo '<table class="table table-striped custab">';
		echo '<thead>';
		echo     '<tr>';
		echo     '<th>'.'Produto'.'</th>';
		echo     '<th>'.'Quantidade'.'</th>';
		echo     '<th>'.'Total'.'</th>';
		echo     '<th class="text-center">'.'A��es'.'</th>';
		echo      '</tr>';
		echo    '</thead>';
		$compra = 0;
		$total = 0;


//exibe o carrinho
 if(count($_SESSION['itens']) == 0 ) {
 	echo 'Carrinho Vazio<br/><a href="carrinho-compras.php">Adicionar Itens</a>';
 } else {
 	require 'config.php';
 	foreach($_SESSION['itens'] as $idProduto => $quantidade) {
 	$sql = $pdo->prepare("SELECT * FROM produto WHERE id =?");
 	$sql->bindParam(1, $idProduto);
	$sql->execute();
	$produtos = $sql->fetchAll();
	$total = $quantidade * $produtos[0]["preco_venda"];
	
	$compra = $total + $compra;
	echo '<tr class="success">';
		echo '<td>'.$produtos [0] ["nome"].'</td>';
		
		echo '<td>'.$quantidade.'</td>';
		echo '<td>'.'R$ '.number_format($total,2,",",".").'</td>';
		echo '<td class="text-center"><a href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a></td>';					
		echo '</tr>';
		

	/*echo 
		'Nome: '.$produtos [0] ["nome"].'<br/>
		Pre�o: R$ '.number_format($produtos [0] ["preco_venda"],2,",",".").'<br/>
		Quantidade: '.$quantidade.'<br/>
		Total: R$ '.number_format($total,2,",",".").'<br/>
		<a href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a>
		<hr/> 

		';*/

		
	}
	echo '<a href="carrinho-compras.php" class="btn btn-primary">Continuar Comprando</a>';
 }

 		 echo '<tr>';
		echo '<td >'."<strong>TOTAL DA COMPRA</strong>".'</td>';
		echo '<td>'."==========>".'</td>';
		echo '<td style="color:red;">'.'<strong>'.'R$ '.number_format($compra,2,",",".").'</strong>'.'</td>';
		echo '</tr>';
		 echo '<tr>';
		
		echo '</tr>';
	?>


 
 