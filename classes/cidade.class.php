<?php
class Cidade {

	public function getTotalCidade() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM cidade");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrarc($nome, $estado_id, $status) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM cidade WHERE nome = :nome");
		$sql->bindValue(":nome", $nome);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO cidade SET estado_id = :estado_id, nome = :nome, status = :status");
			$sql->bindValue(":estado_id", $estado_id);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":status", $status);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

}
?>