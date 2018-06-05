<?php
class Estado {

	public function getTotalEstado() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM estado");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrare($nome, $sigla, $status) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM estado WHERE nome = :nome");
		$sql->bindValue(":nome", $nome);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO estado SET nome = :nome, sigla = :sigla, status = :status");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":sigla", $sigla);
			$sql->bindValue(":status", $status);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}
}
?>