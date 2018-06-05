<?php
require 'config.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
	$id = addslashes($_GET['id']);


	$sql = "UPDATE produto SET status = 'I' where id = '$id' ";	
	$pdo->query($sql);

	header("Location: produto.php");
} else {
	header("Location: ad_produto.php");
}
?>