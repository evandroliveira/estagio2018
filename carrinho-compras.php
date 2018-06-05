<?php
require 'config.php';
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrinho</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link rel="shortcut icon" type="image/png" href="assets/img/folha.png">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(function() {
            $( "#calendario" ).datepicker({
                showButtonPanel:true
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h1>Compras</h1>
    <form method="POST">
        <div class="col-md-4">
            <label class="col-form-label">Código do Produto</label>
            <input type="text" id="codigo" class="form-control" name="cod_produto" placeholder="Código de Barras">
        </div>
        <div class="col-md-4">
            <label class="col-form-label">Fornecedor</label>
            <input type="text" id="codigo" class="form-control" name="cod_produto" placeholder="Fornecedor">
        </div>
        <div class="col-md-4">
            <label class="col-form-label">Data</label>
            <input type="text" id="calendario" class="form-control" name="dia" placeholder="Código de Barras">
        </div>
        
    </form>
</div>
</div>
</body>
</html>

