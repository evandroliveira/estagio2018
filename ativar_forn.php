<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);

	
	$sql = "UPDATE fornecedor SET status = 'A' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: forn_inativo.php");
} else {
	header("Location: fornecedor.php");
}
?>