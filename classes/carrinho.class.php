<?php
    class Carrinho {

        public function getTotalCarrinho() {
            global $pdo;

            $sql = $pdo->query("SELECT COUNT(*) as co FROM compra");
            $row = $sql->feth();

            return $row['co'];
        }

        /**
         * @param $id
         * @param $fornecedor_id
         * @param $data
         * @param $valor_total
         * @param $desconto
         * @param $valor_liquido
         * @param $status
         */
        public function cadastrarco($id, $fornecedor_id, $data, $valor_total, $desconto, $valor_liquido, $status) {
            global $pdo;

            $sql = $pdo->prepare("SELECT id FROM compra WHERE id = :id");
            $sql->bindValue(":id", $id);
            $sql->execute();

            if($sql->rowCount() == 0) {

               $sql = $pdo->prepare("INSERT INTO compra SET fornecedor_id = :fornecedor_id, dia = :dia, valor_total = :valor_total, descoto = :desconto, valor_liquido = :valor_liquido, status = :status");
               $sql->bindValue(":fornecedor_id", $fornecedor_id);
               $sql->bindValue(":data", $data);
               $sql->bindValue(":valor_total", $valor_total);
               $sql->bindValue(":desconto", $desconto);
               $sql->bindValue(":valor_liquido", $valor_liquido);
               $sql->bindValue(":status", $status);
               $sql->execute();

               return true;

            }else {
                return false;
            }
        }
    }
?>