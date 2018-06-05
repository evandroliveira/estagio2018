<?php
	try {
		$pdo = new PDO("mysql:dbname=cantinho;host=localhost", "root", "");
		
	} catch (PDOEception $e) {
		echo "ERRO: ".$e->getMessage();
	}
?>