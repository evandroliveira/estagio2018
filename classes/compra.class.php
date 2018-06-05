<?php
class Compra {

	public function getTotalCompra() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as co FROM compra");
		$row = $sql->fetch();

		return $row['co'];
	}

	public function cadastrarco($fornecedor_id, $data, $valor_total, $desconto, $valor_liquido, $status) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM compra WHERE fornecedor_id = :fornecedor_id");
		$sql->bindValue(":fornecedor_id", $fornecedor_id);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO compra SET  fornecedor_id = :fornecedor_id, data = :data, valor_total = :valor_total, desconto = :desconto, valor_liquido = :valor_liquido, status = :status");
			$sql->bindValue(":data", $data);
			$sql->bindValue(":fornecedor_id", $fornecedor_id);
			$sql->bindValue(":valor_total", $valor_total);
			$sql->bindValue(":desconto", $desconto);
			$sql->bindValue(":valor_liquido", $valor_liquido);
			$sql->bindValue(":status", $status);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

}
?>