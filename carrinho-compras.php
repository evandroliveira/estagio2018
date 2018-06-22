<?php
require 'config.php';
require 'assets/pages/menu.php';
require 'classes/banco.php';
require 'classes/conexao.php';
session_start();

/*require 'classes/carrinho.class.php';


$f = new Carrinho();
if(isset($_POST['fornecedor_id']) && !empty($_POST['fornecedor_id'])) {
    $fornecedor_id = addslashes($_POST['fornecedor_id']);
    $dia = addslashes($_POST['dia']);
    $valor_total = addslashes($_POST['valor_total']);
    $desconto = addslashes($_POST['desconto']);
    $valor_liquido = addslashes($_POST['valor_liquido']);
    $status = $_POST['status'];

    if(!empty($fornecedor_id) && !empty($dia) && !empty($valor_total) && !empty($desconto) && !empty($valor_liquido) && !empty($status)) {
        if($f->cadastrarco($fornecedor_id, $dia, $valor_total, $desconto, $valor_liquido, $status)) {
            ?>

            <div class="alert alert-success">
                Compra Cadastrada com sucesso!
            </div>


            <?php
        } else {
            ?>
            <div class="alert alert-warning">
                Esta Compra já existe!
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

*/

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Carrinho</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="viewport" content="width=device-width, user-scalable=0">
	<link rel="stylesheet" type="text/css" href="assets/css/tamplate.css">
	<link rel="shortcut icon" type="image/png" href="assets/img/folha.png">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

</head>
<body>
<div class="container">
    <a href="carrinho.php" class="btn btn-default btn-ms">Carrinho</a>
    <form method="POST" class="form-horizontal" name="frmCadastro" id="frmCadastro" action="carrinho-compras.php">
        <fieldset>
            <div class="panel panel-primary">
                <div class="panel-heading">Compras</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-md-11 control-label">
                                <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <label class="col-form-label">Fornecedor <h11> *</h11></label>
                                <select name="fornecedor_id" id="fornecedor_id" class="form-control">
                                    <?php
                                    $banco->query("SELECT id, nome FROM fornecedor
                                                        WHERE status = 'A'
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
                            <div class="col-md-4">
                                <label class="col-form-label">Data<h11> *</h11></label>
                                <input type="date" id="calendario" class="form-control" name="dia" placeholder="Código de Barras">
                            </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Valor Total</label>
                            <input type="number" id="valor_total" class="form-control" name="valor_total">
                        </div>
                        <div class="col-md-2">
                            <label class="col-form-label">Desconto</label>
                            <input type="number" id="desconto" class="form-control" name="desconto" placeholder="Desconto">
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">valor Líquido</label>
                            <input type="number" id="valor_liquido" class="form-control" name="valor_liquido" ">
                        </div>
                        <div class="col-md-3">
                            <label class="col-form-label">Status</label>
                            <select class="form-control" name="status">
                                <option></option>
                                <option>A</option>
                                <option>I</option>
                            </select>
                        </div>

                     </div>
                <div class="form-group" style="margin-left: 13px;">
                    <div class="col-lg-1">
                        <input type="submit" value="Comprar" class="btn btn-primary btn-ms">
                    </div>
                </div>
            </div>

        </fieldset>
    </form>

</div>

</body>
</html>

