<?php
class Lote {

	public function getTotalLote() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM lote");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrarl($numero_lote, $validade_lote, $quantidade) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM lote WHERE numero_lote = :numero_lote");
		$sql->bindValue(":numero_lote", $numero_lote);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO lote SET  numero_lote = :numero_lote, validade_lote = :validade_lote, quantidade = :quantidade");
			$sql->bindValue(":numero_lote", $numero_lote);
			$sql->bindValue(":validade_lote", $validade_lote);
			$sql->bindValue(":quantidade", $quantidade);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

}
?>