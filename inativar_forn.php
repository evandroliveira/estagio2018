<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);


	$sql = "UPDATE fornecedor SET status = 'I' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: fornecedor.php");
} else {
	header("Location: ad_fornecedor.php");
}
?>