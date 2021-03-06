<?php
class Fornecedor {

	public function getTotalFornecedor() {
		global $pdo;

		$sql = $pdo->query("SELECT COUNT(*) as c FROM fornecedor");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrarfor($nome, $cnpj, $endereco, $numero,$bairro,$telefone, $celular, $email, $status, $cidade_id) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM fornecedor WHERE nome = :nome");
		$sql->bindValue(":nome", $nome);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO fornecedor SET nome = :nome, cnpj = :cnpj, endereco = :endereco, numero = :numero, bairro = :bairro, telefone = :telefone, celular = :celular, email = :email, status = :status, cidade_id = :cidade_id");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":cnpj", $cnpj);
			$sql->bindValue(":endereco", $endereco);
			$sql->bindValue(":numero", $numero);
			$sql->bindValue(":bairro", $bairro);
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":celular", $celular);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":status", $status);
			$sql->bindValue(":cidade_id", $cidade_id);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

}
?>