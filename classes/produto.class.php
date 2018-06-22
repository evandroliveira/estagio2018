<?php
class Produto {

    public function getTotalProduto() {
        global $pdo;

        $sql = $pdo->query("SELECT COUNT(*) as p FROM produto");
        $row = $sql->fetch();

        return $row['p'];
    }

    public function cadastrarp($nome, $cod_produto, $preco_custo, $preco_venda, $quantidade, $status) {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM produto WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if($sql->rowCount() == 0) {

            $sql = $pdo->prepare("INSERT INTO produto SET nome  = :nome, cod_produto = :cod_produto, preco_custo = :preco_custo, preco_venda = :preco_venda, quantidade = :quantidade, status = :status");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":cod_produto", $cod_produto);
            $sql->bindValue(":preco_custo, $preco_custo");
            $sql->bindValue("preco_venda", $preco_venda);
            $sql->bindValeu("quantidade", $quantidade);
            $sql->bindValue(":status", $status);
            $sql->execute();

            return true;

        } else {
            return false;
        }

    }

}
?>